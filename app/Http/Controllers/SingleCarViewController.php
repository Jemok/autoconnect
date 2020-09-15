<?php

namespace App\Http\Controllers;

use App\BulkAd;
use App\Repositories\AdStatusRepository;
use App\Repositories\BulkAdsRepository;
use App\Repositories\CarSearchRepository;
use App\Repositories\UserVerificationRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Illuminate\Http\Request;

class SingleCarViewController extends Controller
{
    public function show($vehicleDetailId,
                         VehicleDetailRepository $vehicleDetailRepository,
                         VehicleImagesRepository $vehicleImagesRepository,
                         AdStatusRepository $adStatusRepository,
                         BulkAdsRepository $bulkAdsRepository,
                         UserVerificationRepository $userVerificationRepository,
                         CarSearchRepository $carSearchRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleDetailId);

        $bulk_ad = checkIfAdIsBulk($vehicleDetailId);

        $ad_status =  $adStatusRepository->showFromVehicleDetail($vehicle_detail->id);

        if($bulk_ad != false){

            $is_bulk = true;

            $vehicle_images = $vehicleImagesRepository->indexForBulUploadVehicle($bulk_ad->user_bulk_import_id);
        }else{

            $is_bulk = false;

            $vehicle_images = $vehicleImagesRepository->indexForVehicle($vehicleDetailId);
        }

        $other_features = json_decode($vehicle_detail->other_features, true);

        return view('front.single-car-view', compact('vehicle_detail',
            'vehicle_images',
            'vehicleDetailId',
            'is_bulk',
            'adStatusRepository',
            'bulkAdsRepository',
            'userVerificationRepository',
            'carSearchRepository',
            'ad_status',
            'other_features'));
    }
}
