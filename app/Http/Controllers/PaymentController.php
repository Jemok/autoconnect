<?php

namespace App\Http\Controllers;

use App\AddPrice;
use App\Http\Requests\PayForBulkRequest;
use App\Jobs\StkPushJob;
use App\MpesaPayment;
use App\Notifications\BulkImportAdNotification;
use App\Notifications\PaymentReceivedNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\BulkAdsRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VehicleDetailRepository;
use App\Services\PayForAdService;
use App\Services\PayForBulkService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function makePayment($vehicleId,
                                $paymentType,
                                PayForAdService $payForAdService,
                                PaymentRepository $paymentRepository,
                                VehicleDetailRepository $vehicleDetailRepository,
                                Request $request
    ){
        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        if($request->period == 4){
            $no_of_days  = 30;
        }

        if($request->period == 6){
            $no_of_days  = 45;
        }

        if($request->period == 8){
            $no_of_days  = 60;
        }

        if($request->period == null){

            $no_of_days = 1000000;
        }

        if($paymentType == 'ultimate'){

            $vehiclePayment = $paymentRepository->store($vehicleDetail,
                $vehicleId,
                'standard',
                $no_of_days
            );

        }else{

            $vehiclePayment = $paymentRepository->store($vehicleDetail,
                $vehicleId,
                $paymentType,
                $no_of_days
            );
        }



        if($paymentType == 'standard'){

            $amount = (int) AddPrice::where('weeks', $request->period)->firstOrFail()->amount;


        }elseif ($paymentType == 'premium'){

            $amount = (int) AddPrice::where('weeks', $request->period)->firstOrFail()->amount;
        }elseif ($paymentType == 'ultimate'){

            $amount = 2500;
        }

        $mpesa_credentials = base64_encode(env('LIPA_ONLINE_KEY').':'.env('LIPA_ONLINE_SECRET'));

        Log::info('B64'. $mpesa_credentials);

        $phone_number = '254'.substr($vehicleDetail->vehicle_contact->phone_number, 1);
        try{

            $mpesa_payment  = new MpesaPayment();

            $mpesa_payment->univas_car_id = $vehicleDetail->id;
            $mpesa_payment->vehicle_payment_id = $vehiclePayment->id;
            $mpesa_payment->mpesa_account_number = $vehicleDetail->id.'-1';
            $mpesa_payment->type = 'single';
            $mpesa_payment->amount = $amount;

            $mpesa_payment->save();

            dispatch(new StkPushJob($mpesa_credentials, $phone_number, $mpesa_payment->mpesa_account_number, (int) $amount));

            flash()->overlay('Ensure Phone is Unlocked'. '<br><br>If you dont see pop up on your phone, <br> Close all open apps on your phone and try again <br> OtherWise Use : <br> Mpesa Paybill no: '.env('PAYBILL').'<br> Account Number: '.$mpesa_payment->mpesa_account_number. '<br> Amount: KES '.(int)$amount, 'Enter Mpesa Pin on Phone');
            return redirect()->back();
        }
        catch (\Exception $exception){

            if ($exception instanceof \GuzzleHttp\Exception\RequestException) {
                // get the full text of the exception (including stack trace),
                // and replace the original message (possibly truncated),
                // with the full text of the entire response body.
                if($exception != null){
                    if($exception->getResponse() != null){
                        $message = str_replace(
                            rtrim($exception->getMessage()),
                            (string) $exception->getResponse()->getBody(),
                            (string) $exception
                        );

                        Log::info('ERROR MESSAGE API : '.$message);
                    }else{
                        Log::info('ERROR MESSAGE API GET RESPONSE IS NULL :'.$exception->getResponse());
                    }
                }
            }


//        $response = $payForAdService->handle($vehicleDetail, $vehiclePayment, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);

            flash()->overlay('Close all open apps on your phone and try again<br> If you dont see pop up on your phone <br> Use <br> Mpesa Paybill no: '.env('PAYBILL').'<br> Account Number: '.$vehicleDetail->id.'-1'. '<br> Amount: KES '.(int)$amount, 'Please try again');

//            flash()->overlay('We are unable to process your payment', 'Please try again shortly');

            return redirect()->back();
        }
    }

    public function processPayment(Request $request,
                                   PaymentRepository $paymentRepository,
                                   VehicleDetailRepository $vehicleDetailRepository,
                                   AdStatusRepository $adStatusRepository,
                                   UsersRepository $usersRepository){
        $vehiclePaymentId = $request->externalIdentifier;
        $paymentStatus = $request->status;
        $amount = $request->transactedAmount;

        $vehicle_payment = $paymentRepository->show($vehiclePaymentId);

        $vehicle_detail = $vehicleDetailRepository->show($vehicle_payment->vehicle_detail_id);

        $paymentRepository->storePaymentResult($request->all(), $vehicle_detail->id, $vehicle_payment->id);

        $vehicle_contact = $vehicle_detail->vehicle_contact;

        $vehicle = $vehicle_detail->car_make->name.' '.$vehicle_detail->car_model->name;

        if($paymentStatus == 'success'){

            $paymentRepository->setAsPaid($vehicle_payment);

            $user = $usersRepository->checkIfExistsUsingEmail($vehicle_contact->email, $vehicle_contact);

            $start = Carbon::now();

            $stop = Carbon::now()->addDays($vehicle_payment->no_of_days);

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

        return response()->json(['message' => 'success']);
    }

    public function showBulkPaymentsPage($bulkImportId,
                                         BulkImportRepository $bulkImportRepository){

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulkImportRepository->storeBulkImportStatus($bulk_import, 'payment');

        return view('bulk-uploads.pay', compact('bulkImportId'));
    }

    public function payForBulk($bulkImportId,
                               BulkImportRepository $bulkImportRepository){

        $bulk_approval = $bulkImportRepository->showApproval($bulkImportId);

        return view('bulk-uploads.bulk-payment', compact('bulk_approval', 'bulkImportId'));
    }

    public function makeBulkPayment($bulkImportId,
                                    PayForBulkRequest $payForBulkRequest,
                                    BulkImportRepository $bulkImportRepository,
                                    PayForBulkService $payForAdService,
                                    PaymentRepository $paymentRepository
    ){

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulk_approval = $bulkImportRepository->showApproval($bulkImportId);

        $mpesa_credentials = base64_encode(env('LIPA_ONLINE_KEY').':'.env('LIPA_ONLINE_SECRET'));

        Log::info('B64'. $mpesa_credentials);

        $phone_number = '254'.substr($payForBulkRequest->phone_number, 1);

        try{

            $mpesa_payment  = new MpesaPayment();

            $mpesa_payment->amount = (int) $bulk_approval->amount;
            $mpesa_payment->univas_car_id = $bulk_import->id;
            $mpesa_payment->vehicle_payment_id = $bulk_approval->id;
            $mpesa_payment->mpesa_account_number = $bulk_import->id.'-2';
            $mpesa_payment->type = 'bulk';

            $mpesa_payment->save();

            dispatch(new StkPushJob($mpesa_credentials, $phone_number, $mpesa_payment->mpesa_account_number, (int) $bulk_approval->amount));

            flash()->overlay('Ensure Phone is Unlocked'. '<br><br>If you dont see pop up on your phone, <br> Close all open apps on your phone and try again <br> OtherWise Use : <br> Mpesa Paybill no: '.env('PAYBILL').'<br> Account Number: '.$mpesa_payment->mpesa_account_number. '<br> Amount: KES '.(int) $bulk_approval->amount, 'Enter Mpesa Pin on Phone');
            return redirect()->back();
        }
        catch (\Exception $exception){

            if ($exception instanceof \GuzzleHttp\Exception\RequestException) {
                // get the full text of the exception (including stack trace),
                // and replace the original message (possibly truncated),
                // with the full text of the entire response body.
                if($exception != null){
                    if($exception->getResponse() != null){
                        $message = str_replace(
                            rtrim($exception->getMessage()),
                            (string) $exception->getResponse()->getBody(),
                            (string) $exception
                        );

                        Log::info('ERROR MESSAGE API : '.$message);
                    }else{
                        Log::info('ERROR MESSAGE API GET RESPONSE IS NULL :'.$exception->getResponse());
                    }
                }
            }


//        $response = $payForAdService->handle($vehicleDetail, $vehiclePayment, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);

            flash()->overlay('Close all open apps on your phone and try again<br> If you dont see pop up on your phone <br> Use <br> Mpesa Paybill no: '.env('PAYBILL').'<br> Account Number: '.$mpesa_payment->mpesa_account_number. '<br> Amount: KES '.(int) $bulk_approval->amount, 'Please try again');

//            flash()->overlay('We are unable to process your payment', 'Please try again shortly');

            return redirect()->back();
        }

//        $payForAdService->handle($bulk_approval, $bulk_approval, $payForBulkRequest->phone_number, $bulk_approval->amount, $bulk_import->user->name);

//        flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

//        return redirect()->back();
    }

    public function processBulkPayment(Request $request,
                                       BulkImportRepository $bulkImportRepository,
                                       PaymentRepository $paymentRepository){

        $bulkApprovalId = $request->externalIdentifier;
        $paymentStatus = $request->status;
        $amount = $request->transactedAmount;

        $bulkApproval = $bulkImportRepository->showApprovalUsingId($bulkApprovalId);

        $user = $bulkApproval->bulk_import->user;

        $paymentRepository->storeBulkPaymentResult($request->all(), $bulkApprovalId);

        if($paymentStatus == 'success'){

            $bulkImportRepository->setApprovalAsApproved($bulkApproval);

            $bulkImportRepository->moveAdsToLive($bulkApproval->bulk_import_id,
                new BulkAdsRepository());

            $user->notify(new PaymentReceivedNotification($amount,
                $user->name,
                ' Bilk Import Batch '.$bulkApproval->bulk_import->id));

            $user->notify(new BulkImportAdNotification($bulkApproval->bulk_import, $user));
        }

        return response()->json(['message' => 'success']);
    }
}

