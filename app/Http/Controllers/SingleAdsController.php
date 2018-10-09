<?php

namespace App\Http\Controllers;

use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;

class SingleAdsController extends Controller
{
    public function index(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return view('single-ads.index', compact('single_ads'));
    }

    public function indexImages($vehicleId,
                                VehicleDetailRepository $vehicleDetailRepository,
                                VehicleImagesRepository $vehicleImagesRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $vehicle_images = $vehicleImagesRepository->indexForVehicle($vehicleId);

        return view('single-ads.index-images', compact('vehicleId',
            'vehicle_detail',
            'vehicle_images'));

    }
}
