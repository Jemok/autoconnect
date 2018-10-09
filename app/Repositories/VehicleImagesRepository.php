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
            ->where('image_area', '!=', 'other')
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

    public function checkIfImagesExist($vehicleId){

        if(VehicleImage::where('vehicle_detail_id', $vehicleId)
            ->where('image_area', 'frontImage')
            ->exists()){
            if(VehicleImage::where('vehicle_detail_id', $vehicleId)
                ->where('image_area', 'backImage')
                ->exists()){
                if(VehicleImage::where('vehicle_detail_id', $vehicleId)
                    ->where('image_area', 'leftImage')
                    ->exists()){
                    if(VehicleImage::where('vehicle_detail_id', $vehicleId)
                        ->where('image_area', 'rightImage')
                        ->exists()){
                        if(VehicleImage::where('vehicle_detail_id', $vehicleId)
                            ->where('image_area', 'interiorImage')
                            ->exists()){
                            if(VehicleImage::where('vehicle_detail_id', $vehicleId)
                                ->where('image_area', 'dashboardImage')
                                ->exists()){
                                return true;
                            }else{
                                return false;
                            }
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function indexForVehicle($vehicleId){

        return VehicleImage::where('vehicle_detail_id', $vehicleId)->get();
    }
}