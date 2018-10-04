<?php

namespace App\Http\Controllers;

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

            $payForAdService->handle($vehicleDetail, $vehicleDetail->vehicle_contact->phone_number, $amount, $vehicleDetail->vehicle_contact->name);


            flash()->overlay('Please wait to enter mpesa pin on phone', 'Enter Mpesa Pin');

            return redirect()->back();

    }
}

