<?php

namespace App\Http\Controllers;

use App\Area;
use App\Repositories\CarSearchRepository;
use App\Repositories\UserVerificationRepository;
use App\VehicleContact;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function filterByLocation($areaId,
                                     CarSearchRepository $carSearchRepository,
                                     UserVerificationRepository $userVerificationRepository){

        $area = Area::where('id', $areaId)->firstOrFail();

        $vehicles = VehicleContact::where('area_id', $areaId)->paginate(10);

        return view('front.area-vehicles', compact(
            'area',
            'vehicles',
            'carSearchRepository',
            'userVerificationRepository'));
    }
}
