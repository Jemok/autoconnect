<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 8:32 AM
 */

namespace App\Repositories;


use App\VehicleDetail;
use App\VehicleImage;

class VehicleImagesRepository
{
    public function store(VehicleDetail $vehicleDetail, $imageName, $imageArea, $vehicleId){

        if(VehicleImage::where('image_area', $imageArea)
            ->where('vehicle_detail_id', $vehicleId)
            ->exists()){

            $vehicleImage = VehicleImage::where('image_area', $imageArea)
                ->where('vehicle_detail_id', $vehicleId)
                ->firstOrFail();

            $vehicleImage->image_name = $imageName;

            $vehicleImage->save();

            return $vehicleImage;
        }

        $vehicleImage = new VehicleImage();

        $vehicleImage->image_area = $imageArea;
        $vehicleImage->image_name = $imageName;

        return $vehicleDetail->vehicle_images()->save($vehicleImage);
    }
}