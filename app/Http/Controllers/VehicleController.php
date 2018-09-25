<?php

namespace App\Http\Controllers;

use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;

class VehicleController extends Controller
{
    /**
     * @param CarMakeRepository $carMakeRepository
     * @param CarModelRepository $carModelRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CarMakeRepository $carMakeRepository,
                           CarModelRepository $carModelRepository){

        $car_makes = $carMakeRepository->index();

        $car_models = $carModelRepository->index();

        return view('vehicles.create', compact('car_makes','car_models'));
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
