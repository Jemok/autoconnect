<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 11:47 AM
 */

namespace App\Repositories;


use App\VehicleDetail;
use App\VehiclePayment;

class PaymentRepository
{
    public function store(VehicleDetail $vehicleDetail,
                          $vehicleId,
                          $package){

        if(VehiclePayment::where('vehicle_detail_id', $vehicleId)->exists()){

            $vehiclePayment = VehiclePayment::where('vehicle_detail_id', $vehicleId)
                ->firstOrFail();

            $vehiclePayment->package = $package;

            $vehiclePayment->save();

            $vehiclePayment->save();

            return $vehiclePayment;
        }

        $vehiclePayment = new VehiclePayment();

        $vehiclePayment->package = $package;

        return $vehicleDetail->vehicle_payment()->save($vehiclePayment);
    }

    public function indexForVehicle($vehicleId){

        return VehiclePayment::where('vehicle_detail_id', $vehicleId)->latest()->get();
    }
}