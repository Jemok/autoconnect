<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 10:01 AM
 */

namespace App\Repositories;


use App\VehicleContact;
use App\VehicleDetail;

class VehicleContactRepository
{
    public function store(array $data,
                          VehicleDetail $vehicleDetail,
                          $vehicleId){

        if(VehicleContact::where('vehicle_detail_id', $vehicleId)->exists()){

            $vehicleContact = VehicleContact::where('vehicle_detail_id', $vehicleId)
                                              ->firstOrFail();

            $vehicleContact->name = $data['name'];
            $vehicleContact->phone_number = $data['phone_number'];
            $vehicleContact->country_code = $data['country_code'];
            $vehicleContact->email = $data['email'];
            $vehicleContact->area_id = $data['area'];

            $vehicleContact->save();

            return $vehicleContact;
        }

        $vehicleContact = new VehicleContact();

        $vehicleContact->name = $data['name'];
        $vehicleContact->phone_number = $data['phone_number'];
        $vehicleContact->country_code = $data['country_code'];
        $vehicleContact->email = $data['email'];
        $vehicleContact->area_id = $data['area'];

        return $vehicleDetail->vehicle_contact()->save($vehicleContact);
    }
}