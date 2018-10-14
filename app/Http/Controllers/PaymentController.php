<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceivedNotification;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use App\Services\PayForAdService;
use Illuminate\Http\Request;

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
            $amount = 2900;
        }elseif ($paymentType == 'premium'){
            $amount = 5000;
        }

        $payForAdService->handle($vehicleDetail, $vehiclePayment, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);

        flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

        return redirect()->back();
    }

    public function processPayment(Request $request,
                                   PaymentRepository $paymentRepository,
                                   VehicleDetailRepository $vehicleDetailRepository){

        $vehiclePaymentId = $request->thirdPartyIdentifier;
        $paymentStatus = $request->paymentStatus;
        $amount = $request->transactedAmount;

        $vehicle_payment = $paymentRepository->show($vehiclePaymentId);

        $vehicle_detail = $vehicleDetailRepository->show($vehicle_payment->vehicle_detail_id);

        $vehicle_contact = $vehicle_detail->vehicle_contact;

        $vehicle = $vehicle_detail->car_make->name.' '.$vehicle_detail->car_model->name;

        if($paymentStatus == 'Completed'){

            $paymentRepository->setAsPaid($vehicle_payment);

            $vehicle_contact->notify(new PaymentReceivedNotification($amount,
                $vehicle_contact->name,
                $vehicle));
        }

        return response()->json(['message' => 'success']);
    }
}

