<?php

namespace App\Http\Controllers;

use App\BodyType;
use App\Http\Requests\CarDetailsRequest;
use App\Repositories\BodyTypeRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\DutyRepository;
use App\Repositories\FuelTypeRepository;
use App\Repositories\InteriorRepository;
use App\Repositories\TransmissionTypeRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleFeaturesRepository;
use Carbon\Carbon;

class VehicleController extends Controller
{
    /**
     * @param CarMakeRepository $carMakeRepository
     * @param CarModelRepository $carModelRepository
     * @param BodyTypeRepository $bodyTypeRepository
     * @param TransmissionTypeRepository $transmissionTypeRepository
     * @param CarConditionRepository $carConditionRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CarMakeRepository $carMakeRepository,
                           CarModelRepository $carModelRepository,
                           BodyTypeRepository $bodyTypeRepository,
                           TransmissionTypeRepository $transmissionTypeRepository,
                           CarConditionRepository $carConditionRepository,
                           DutyRepository $dutyRepository,
                           FuelTypeRepository $fuelTypeRepository,
                           InteriorRepository $interiorRepository,
                           ColourTypeRepository $colourTypeRepository,
                           VehicleFeaturesRepository $vehicleFeaturesRepository){

        $car_makes = $carMakeRepository->index();

        $car_models = $carModelRepository->index();

        $body_types = $bodyTypeRepository->index();

        $transmission_types = $transmissionTypeRepository->index();

        $car_conditions = $carConditionRepository->index();

        $duties = $dutyRepository->index();

        $fuel_types = $fuelTypeRepository->index();

        $interiors = $interiorRepository->index();

        $colour_types = $colourTypeRepository->index();

        $vehicle_features = $vehicleFeaturesRepository->index();

        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        return view('vehicles.create', compact('car_makes',
            'car_models',
            'next_year',
            'start_year',
            'body_types',
            'transmission_types',
            'car_conditions',
            'duties',
            'fuel_types',
            'interiors',
            'colour_types',
            'vehicle_features'));
    }

    public function store(CarDetailsRequest $carDetailsRequest,
                          VehicleDetailRepository $vehicleDetailRepository){

        $vehicle_detail = $vehicleDetailRepository->store($carDetailsRequest->all(),
            new CarMakeRepository(),
            new CarModelRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository());

        return redirect()->route('createVehiclePictures',  $vehicle_detail->id);
    }


    public function createPictures($vehicleId){

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
