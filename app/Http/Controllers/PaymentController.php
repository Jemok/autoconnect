<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayForBulkRequest;
use App\Notifications\BulkImportAdNotification;
use App\Notifications\PaymentReceivedNotification;
use App\Repositories\BulkImportRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use App\Services\PayForAdService;
use App\Services\PayForBulkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function makePayment($vehicleId,
                                $paymentType,
                                PayForAdService $payForAdService,
                                PaymentRepository $paymentRepository,
                                VehicleDetailRepository $vehicleDetailRepository
    ){
        $vehicleDetail = $vehicleDetailRepository->show($vehicleId);

        $vehiclePayment = $paymentRepository->store($vehicleDetail,
            $vehicleId,
            $paymentType
        );

        if($paymentType == 'standard'){
            $amount = 5;
        }elseif ($paymentType == 'premium'){
            $amount = 5;
        }

        $payForAdService->handle($vehicleDetail, $vehiclePayment, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);

        flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

        return redirect()->back();
    }

    public function processPayment(Request $request,
                                   PaymentRepository $paymentRepository,
                                   VehicleDetailRepository $vehicleDetailRepository){
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

            $bulkImportRepository->moveAdsToLive($bulkApproval->bulk_import_id);

            $user->notify(new PaymentReceivedNotification($amount,
                $user->name,
                ' Bilk Import Batch '.$bulkApproval->bulk_import->id));

            $user->notify(new BulkImportAdNotification($bulkApproval->bulk_import, $user));
        }

        return response()->json(['message' => 'success']);

    }
}

