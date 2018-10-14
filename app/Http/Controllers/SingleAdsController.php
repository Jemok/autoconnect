<?php

namespace App\Http\Controllers;

use App\Notifications\AdActivatedNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\SingleAdsRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleImagesRepository;
use Carbon\Carbon;

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

        $other_features = json_decode($vehicle_detail->other_features, true);

        return view('single-ads.index-images', compact('vehicleId',
            'vehicle_detail',
            'vehicle_images',
            'other_features'));
    }

    public function activateAd($vehicleId,
                               $vehiclePaymentId,
                               VehicleDetailRepository $vehicleDetailRepository,
                               PaymentRepository $paymentRepository,
                               AdStatusRepository $adStatusRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $contact = $vehicle_detail->vehicle_contact;

        $vehicle_payment = $paymentRepository->show($vehiclePaymentId);

        $start = Carbon::now();

        $stop = Carbon::now()->addDays(30);

        if($vehicle_payment->package == 'standard'){

            $package = 'Standard';

        }elseif ($vehicle_payment->package == 'premium'){

            $package = 'Premium';
        }

        $adStatusRepository->storeAdStatus($vehicle_detail,
            $vehicle_payment,
            'active',
            $start,
            $stop);

        $contact->notify(new AdActivatedNotification($contact,
            $vehicle_detail,
            $start->toDateString(),
            $stop->toDateString(),
            $vehicle_payment,
            $package));

        flash()->overlay('The Ad has been created, Start : '. $start->toDateString(). ' Stop : '. $stop->toDateString(), 'Success');

        return redirect()->back();
    }
}
