<?php

namespace App\Http\Controllers;

use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Illuminate\Http\Request;

class SingleCarViewController extends Controller
{
    public function show($vehicleDetailId,
                         VehicleDetailRepository $vehicleDetailRepository,
                         VehicleImagesRepository $vehicleImagesRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleDetailId);

        $bulk_ad = checkIfAdIsBulk($vehicleDetailId);

        if($bulk_ad != false){

            $vehicle_images = $vehicleImagesRepository->indexForBulUploadVehicle($bulk_ad->user_bulk_import_id);
        }else{

            $vehicle_images = $vehicleImagesRepository->indexForVehicle($vehicleDetailId);
        }

        return view('front.single-car-view', compact('vehicle_detail',
            'vehicle_images',
            'vehicleDetailId',
            'is_bulk'));
    }
}
