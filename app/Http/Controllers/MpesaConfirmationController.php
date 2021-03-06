<?php

namespace App\Http\Controllers;

use App\ErrorNotificationModel;
use App\Jobs\CheckTransactionStatusJob;
use App\Jobs\MpesaConfirmationJob;
use App\Jobs\SendSmsJob;
use App\Jobs\ThirdPartyCollectionNotificationJob;
use App\Jobs\ThirdPartyNotificationJob;
use App\MpesaApiPayment;
use App\MpesaConfirmation;
use App\MpesaPayment;
use App\MpesaRenewalPayment;
use App\Notifications\BulkImportAdNotification;
use App\Notifications\PaymentReceivedNotification;
use App\Notifications\PhoneRollupNotification;
use App\Notifications\RenewalPaymentNotification;
use App\Notifications\TransactionStatusErrorNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\AirtimeRepository;
use App\Repositories\BillingCostRepository;
use App\Repositories\BulkAdsRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\KplcRepository;
use App\Repositories\PaymentCallbackRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentResultsRepository;
use App\Repositories\PreConfirmationRepository;
use App\Repositories\PreConfirmationStatusRepository;
use App\Repositories\StkCheckRepository;
use App\Repositories\TransactionStatusRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VehicleDetailRepository;
use App\Traits\accountTrait;
use App\Traits\MpesaConfirmationTrait;
use App\Traits\PaymentTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\MpesaConfirmationRepository;
use App\Repositories\AccountRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\OrganizationBalanceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking;

class MpesaConfirmationController extends Controller
{
    public function confirmation(Request $request,
                                 PaymentRepository $paymentRepository,
                                 VehicleDetailRepository $vehicleDetailRepository,
                                 UsersRepository $usersRepository,
                                 AdStatusRepository $adStatusRepository,
                                 BulkImportRepository $bulkImportRepository){

        Log::info('MPESA CONFIRMED RN');

        $this->logConfirmationResponse($request);

        $this->makeMpesaConfirmationModel($request->all());

        if(MpesaPayment::where('mpesa_account_number', $request['BillRefNumber'])
            ->where('type', 'single')->exists()){

            Log::info('Single Ad Payment');

            $mpesa_payment = MpesaPayment::where('mpesa_account_number', $request['BillRefNumber'])
                ->where('type', 'single')
                ->firstOrFail();

            $vehiclePaymentId = $mpesa_payment->vehicle_payment_id;
            $paymentStatus = 'success';
            $amount = (float) $request['TransAmount'];

            $vehicle_payment = $paymentRepository->show($vehiclePaymentId);

            if($amount >= $mpesa_payment->amount){
                $vehicle_payment->status = 'paid';

                $vehicle_payment->save();

                $vehicle_detail = $vehicleDetailRepository->show($vehicle_payment->vehicle_detail_id);

//            $paymentRepository->storePaymentResult($request->all(), $vehicle_detail->id, $vehicle_payment->id);

                $vehicle_contact = $vehicle_detail->vehicle_contact;

                $vehicle = $vehicle_detail->car_make->name.' '.$vehicle_detail->car_model->name;

                if($paymentStatus == 'success'){

                    Log::info('SUCCESS');

                    $paymentRepository->setAsPaid($vehicle_payment);

                    $user = $usersRepository->checkIfExistsUsingEmail($vehicle_contact->email, $vehicle_contact);

                    $start = Carbon::now();

                    $stop = Carbon::now()->addDays($vehicle_payment->days);

                    $ad_status = $adStatusRepository->storeAdStatus($vehicle_detail,
                        'pending_verification',
                        $start,
                        $stop,
                        $user->id,
                        'single',
                        $vehicle_payment->package);

                    $adStatusRepository->storeAdPeriod($vehicle_detail,
                        $ad_status,
                        'active',
                        $start,
                        $stop);

                    $vehicle_contact->notify(new PaymentReceivedNotification($amount,
                        $vehicle_contact->name,
                        $vehicle));
                }

                Log::info('COMPLETED');
            }

            return response()->json(['message' => 'success']);
        }


        if(MpesaRenewalPayment::where('mpesa_account_number', $request['BillRefNumber'])
            ->where('type', 'single')
            ->where('status', 'initiated')
            ->where('amount', $request['TransAmount'])
            ->exists()){

            Log::info('Single Ad Renewal Payment');

            $mpesa_payment = MpesaRenewalPayment::where('mpesa_account_number', $request['BillRefNumber'])
                ->where('type', 'single')
                ->where('status', 'initiated')
                ->where('amount', $request['TransAmount'])
                ->firstOrFail();

            $vehiclePaymentId = $mpesa_payment->vehicle_payment_id;
            $paymentStatus = 'success';
            $amount = (float) $request['TransAmount'];

            $vehicle_payment = $paymentRepository->showRenewalPayment($vehiclePaymentId);

            if($amount >= $mpesa_payment->amount){
                $vehicle_payment->status = 'paid';

                $vehicle_payment->save();

                $vehicle_detail = $vehicleDetailRepository->show($vehicle_payment->vehicle_detail_id);

//            $paymentRepository->storePaymentResult($request->all(), $vehicle_detail->id, $vehicle_payment->id);

                $vehicle_contact = $vehicle_detail->vehicle_contact;

                $vehicle = $vehicle_detail->car_make->name.' '.$vehicle_detail->car_model->name;

                if($paymentStatus == 'success'){

                    Log::info('SUCCESS');

                    $paymentRepository->setRenewalAsPaid($vehicle_payment);

                    $user = $usersRepository->checkIfExistsUsingEmail($vehicle_contact->email, $vehicle_contact);

                    $start = Carbon::now();

                    $stop = Carbon::now()->addDays($vehicle_payment->days);

                    // HERE
                    $ad_status = $adStatusRepository->storeAdStatus($vehicle_detail,
                        'online',
                        $start,
                        $stop,
                        $user->id,
                        'single',
                        $vehicle_payment->package);

                    $adStatusRepository->storeAdPeriod($vehicle_detail,
                        $ad_status,
                        'active',
                        $start,
                        $stop);

                    $vehicle_contact->notify(new RenewalPaymentNotification($amount,
                        $vehicle_contact->name,
                        $vehicle));
                }

                Log::info('COMPLETED');
            }

            return response()->json(['message' => 'success']);
        }



        if(MpesaPayment::where('mpesa_account_number', $request['BillRefNumber'])
            ->where('type', 'bulk')->exists()){

            Log::info('Bulk Ad Payment');

            $mpesa_payment = MpesaPayment::where('mpesa_account_number', $request['BillRefNumber'])
                ->where('type', 'bulk')
                ->firstOrFail();

            $bulkApprovalId = $mpesa_payment->vehicle_payment_id;
            $paymentStatus = 'success';
            $amount = (float) $request['TransAmount'];

            $bulkApproval = $bulkImportRepository->showApprovalUsingId($bulkApprovalId);

            $bulkApproval->payment_status = 'paid';

            $bulkApproval->save();

            $user = $bulkApproval->bulk_import->user;

//            $paymentRepository->storeBulkPaymentResult($request->all(), $bulkApprovalId);

            if($paymentStatus == 'success'){

                $bulkImportRepository->setApprovalAsApproved($bulkApproval);

                $bulkImportRepository->moveAdsToLive($bulkApproval->bulk_import_id,
                    new BulkAdsRepository());

                $user->notify(new PaymentReceivedNotification($amount,
                    $user->name,
                    ' Bilk Import Batch '.$bulkApproval->bulk_import->id));

                $user->notify(new BulkImportAdNotification($bulkApproval->bulk_import, $user));
            }


            Log::info('COMPLETED');

            return response()->json(['message' => 'success']);
        }
    }


    public function makeMpesaConfirmationModel(array $request){
        // Instantiate a new MpesaConfirmation Model
        $mpesa_confirmation_model = new MpesaConfirmation();


        $mpesa_confirmation_model->transaction_type = $request['TransactionType'];
        $mpesa_confirmation_model->trans_id   = $request['TransID'];
        $mpesa_confirmation_model->trans_time = $request['TransTime'];
        $mpesa_confirmation_model->trans_amount = (float) $request['TransAmount'];
        $mpesa_confirmation_model->business_short_code = $request['BusinessShortCode'];
        $mpesa_confirmation_model->bill_ref_number     =  strtoupper($request['BillRefNumber']);
        $mpesa_confirmation_model->invoice_number      = $request['InvoiceNumber'];
        $mpesa_confirmation_model->org_account_balance = 0; //$request['OrgAccountBalance'];
        $mpesa_confirmation_model->msisdn              = $request['MSISDN'];
        $mpesa_confirmation_model->internal_transaction_id = $request['ThirdPartyTransID'];
        $mpesa_confirmation_model->first_name                = $request['FirstName'];
        $mpesa_confirmation_model->middle_name               = $request['MiddleName'];
        $mpesa_confirmation_model->last_name                 = $request['LastName'];

        $mpesa_confirmation_model->save();

        return $mpesa_confirmation_model;
    }

    public function logConfirmationResponse($request){
        // Log the MpesaConfirmation Response
        Log::info('Mpesa Confirmation Response '.
            'TransType :'. $request->TransactionType.
            ' : TransID : ' . $request->TransID.
            ' : TransTime :'. $request->TransTime.
            ' : TransAmount :' . $request->TransAmount.
            ' : BusinessShortCode :' . $request->BusinessShortCode.
            ' : BillRefNumber :'      . $request->BillRefNumber.
            ' : InvoiceNumber :'      . $request->InvoiceNumber.
            ' : OrgAccountBalance :'  . $request->OrgAccountBalance.
            ' : MSISDN :'             . $request->MSISDN.
            ' : ThirdPartyTransID :'  . $request->ThirdPartyTransID.
            ' : FirstName :'          . $request->FirstName.
            ' : MiddleName :'         . $request->MiddleName.
            ' : LastName :'           . $request->LastName
        );
    }

}


