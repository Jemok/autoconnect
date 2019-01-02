<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/2/19
 * Time: 11:48 AM
 */

function getVehicleFrontImage($vehicleDetailId){


    if(\App\VehicleImage::where('vehicle_detail_id', $vehicleDetailId)
        ->where('image_area', 'frontImage')
         ->exists()){

        $vehicle_front_image = \App\VehicleImage::where('vehicle_detail_id', $vehicleDetailId)
            ->where('image_area', 'frontImage')
            ->firstOrFail();

        return $vehicle_front_image->image_name;
    }

    return 'front.png';

}