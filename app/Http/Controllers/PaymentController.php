<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayForBulkRequest;
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

        $no_of_days = $request->period * 30;

        $vehiclePayment = $paymentRepository->store($vehicleDetail,
            $vehicleId,
            $paymentType,
        $no_of_days
        );

        if($paymentType == 'standard'){
            $amount = 5;
        }elseif ($paymentType == 'premium'){
            $amount = 5;
        }

        $response = $payForAdService->handle($vehicleDetail, $vehiclePayment, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);

        if($response->getStatusCode() == 200){

            flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

            return redirect()->back();
        }else{

            flash()->overlay('We are unable to process your payment', 'Please try again shortly');

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
                                    PayForBulkService $payForAdService
    ){

        $bulk_import = $bulkImportRepository->showBulkImport($bulkImportId);

        $bulk_approval = $bulkImportRepository->showApproval($bulkImportId);

        $payForAdService->handle($bulk_approval, $bulk_approval, $payForBulkRequest->phone_number, $bulk_approval->amount, $bulk_import->user->name);

        flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

        return redirect()->back();
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

