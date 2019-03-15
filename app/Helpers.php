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

function getBulkVehicleFrontImage($userBulkImportId){


    if(\App\BulkImportImage::where('user_bulk_import_id', $userBulkImportId)
        ->where('image_area', 'frontImage')
        ->exists()){

        $vehicle_front_image = \App\BulkImportImage::where('user_bulk_import_id', $userBulkImportId)
            ->where('image_area', 'frontImage')
            ->firstOrFail();

        return $vehicle_front_image->image_name;
    }

    return 'front.png';

}

function checkIfAdIsBulk($vehicleDetailId){

    if(\App\BulkAd::where('vehicle_detail_id', $vehicleDetailId)->exists()){
        return \App\BulkAd::where('vehicle_detail_id', $vehicleDetailId)->firstOrFail();
    }

    return false;
}