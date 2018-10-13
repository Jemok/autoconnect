<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/13/18
 * Time: 8:33 AM
 */

namespace App\Repositories;


use App\VehicleDetail;
use App\VehicleVerification;

class VehicleVerificationsRepository
{

    public function store(VehicleDetail $vehicleDetail, $status){

        if(VehicleVerification::where('vehicle_detail_id', $vehicleDetail->id)->exists()){

            $vehicle_verification = VehicleVerification::where('vehicle_detail_id', $vehicleDetail->id)->firstOrFail();

            $vehicle_verification->status = $status;

            return $vehicle_verification->save();
        }

        $vehicle_verification = new VehicleVerification();

        $vehicle_verification->status = $status;

        return $vehicleDetail->vehicle_verification()->save($vehicle_verification);
    }

}