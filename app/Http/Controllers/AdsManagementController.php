<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use Illuminate\Http\Request;

class AdsManagementController extends Controller
{
    public function manageVehicleAd($vehicleId,
                                    VehicleDetailRepository $vehicleDetailRepository,
                                    PaymentRepository $paymentRepository,
                                    AdStatusRepository $adStatusRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $vehicle_payments = $paymentRepository->indexForVehicle($vehicleId);

        $ads = $adStatusRepository->indexForVehicle($vehicleId);

        return view('single-ads.manage', compact('vehicle_detail',
            'vehicle_payments',
            'ads'));
    }
}
