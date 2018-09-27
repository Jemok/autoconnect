<?php

namespace App\Http\Controllers;

use App\BodyType;
use App\Repositories\BodyTypeRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\TransmissionTypeRepository;
use Carbon\Carbon;

class VehicleController extends Controller
{
    /**
     * @param CarMakeRepository $carMakeRepository
     * @param CarModelRepository $carModelRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CarMakeRepository $carMakeRepository,
                           CarModelRepository $carModelRepository,
                           BodyTypeRepository $bodyTypeRepository,
                           TransmissionTypeRepository $transmissionTypeRepository){

        $car_makes = $carMakeRepository->index();

        $car_models = $carModelRepository->index();

        $body_types = $bodyTypeRepository->index();

        $transmission_types = $transmissionTypeRepository->index();

        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        return view('vehicles.create', compact('car_makes',
            'car_models',
            'next_year',
            'start_year',
            'body_types',
            'transmission_types'));
    }

    public function createPictures(){

        return view('vehicles.create-pictures');
    }

    public function createContacts(){

        return view('vehicles.create-contacts');
    }

    public function createAd(){

        return view('vehicles.create-ad');
    }

    public function publishVehicleAd(){

        return view('vehicles.publish-ad');
    }
}
