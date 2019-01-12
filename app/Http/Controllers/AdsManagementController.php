<?php

namespace App\Http\Controllers;

use App\Repositories\AdStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\VehicleDetailRepository;
use Illuminate\Http\Request;

class AdsManagementController extends Controller
{
    public function manageVehicleAd($vehicleId,
                                    VehicleDetailRepository $vehicleDetailRepository,
                                    PaymentRepository $paymentRepository,
                                    AdStatusRepository $adStatusRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $vehicle_payments = $paymentRepository->indexForVehicle($vehicleId);

        $ads = $adStatusRepository->indexForVehicle($vehicleId);

        return view('single-ads.manage', compact('vehicle_detail',
            'vehicle_payments',
            'ads'));
    }

    public function indexOnlineAds(){

        return view('ads.admin.index-online');
    }

    public function indexDealerOnlineAds(){

        return view('ads.dealer.index-online');
    }

    public function indexPendingVerificationAds(){

        return view('ads.admin.index-pending-verification');
    }

    public function indexDealerPendingVerificationAds(){

        return view('ads.dealer.index-pending-verification');
    }

    public function indexDeclinedAds(){

        return view('ads.admin.index-declined');
    }

    public function indexDealerDeclinedAds(){

        return view('ads.dealer.index-declined');
    }

    public function indexExpiredAds(){

        return view('ads.admin.index-expired');
    }

    public function indexExpiredAdsForDealer(){

        return view('ads.dealer.index-expired');
    }
}
