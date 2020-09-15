<?php

namespace App\Http\Controllers;

use App\Repositories\AreasRepository;
use App\Repositories\BodyTypeRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\FuelTypeRepository;
use App\Repositories\TransmissionTypeRepository;
use App\Repositories\UserVerificationRepository;
use App\Repositories\VehicleDetailRepository;

class WelcomePageController extends Controller
{
    public function showWelcomePage(CarMakeRepository $carMakeRepository,
                                    CarModelRepository $carModelRepository,
                                    AreasRepository $areasRepository,
                                    BodyTypeRepository $bodyTypeRepository,
                                    ColourTypeRepository $colourTypeRepository,
                                    TransmissionTypeRepository $transmissionTypeRepository,
                                    CarConditionRepository $carConditionRepository,
                                    FuelTypeRepository $fuelTypeRepository,
                                    VehicleDetailRepository $vehicleDetailRepository,
                                    UserVerificationRepository $userVerificationRepository){

        $car_makes = $carMakeRepository->index();

        $car_models = $carModelRepository->index();

        $areas = $areasRepository->index();

        $body_types = $bodyTypeRepository->index();

        $colour_types = $colourTypeRepository->index();

        $transmission_types = $transmissionTypeRepository->index();

        $car_conditions = $carConditionRepository->index();

        $fuel_types = $fuelTypeRepository->index();

        $start_year = 2004;
        $next_year = 2019;

        $featured_cars = $vehicleDetailRepository->getTwentyFourOnline();

        $featured_standard_cars = $vehicleDetailRepository->getEightLatestOnlineStandard();

        $active_car_id = $vehicleDetailRepository->getActiveSliderVehicle()->vehicle_detail_id;

        return view('welcome', compact(
            'car_makes',
            'car_models',
            'start_year',
            'next_year',
            'areas',
            'body_types',
            'colour_types',
            'transmission_types',
            'car_conditions',
            'fuel_types',
            'featured_cars',
            'featured_standard_cars',
            'active_car_id',
        'userVerificationRepository'));
    }

    public function demoDonation(){

        return view('demo-donation');
    }

    public function demoDonationTwo(){

        return view('demo-donation-two');
    }
}
