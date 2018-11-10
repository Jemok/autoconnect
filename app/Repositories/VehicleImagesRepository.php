<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 8:32 AM
 */

namespace App\Repositories;


use App\BulkImportImage;
use App\UserBulkImport;
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

    /**
     * @param $vehicleId
     * @return mixed
     */
    public function indexForBulUploadVehicle($vehicleId){

        return BulkImportImage::where('user_bulk_import_id', $vehicleId)->get();
    }


    public function storeForBulk(UserBulkImport $userBulkImport, $imageName, $imageArea, $vehicleId){

        if(BulkImportImage::where('image_area', $imageArea)
            ->where('user_bulk_import_id', $vehicleId)
            ->where('image_area', '!=', 'other')
            ->exists()){

            $vehicleImage = BulkImportImage::where('image_area', $imageArea)
                ->where('user_bulk_import_id', $vehicleId)
                ->firstOrFail();

            $vehicleImage->image_name = $imageName;

            $vehicleImage->save();

            return $vehicleImage;
        }

        $vehicleImage = new BulkImportImage();

        $vehicleImage->image_area = $imageArea;
        $vehicleImage->image_name = $imageName;

        return $userBulkImport->bulk_import_images()->save($vehicleImage);
    }

    public function checkIfImagesExistForBulk($vehicleId){

        if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
            ->where('image_area', 'frontImage')
            ->exists()){
            if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
                ->where('image_area', 'backImage')
                ->exists()){
                if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
                    ->where('image_area', 'leftImage')
                    ->exists()){
                    if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
                        ->where('image_area', 'rightImage')
                        ->exists()){
                        if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
                            ->where('image_area', 'interiorImage')
                            ->exists()){
                            if(BulkImportImage::where('user_bulk_import_id', $vehicleId)
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
}