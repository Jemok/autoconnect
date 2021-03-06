<?php

namespace App\Http\Controllers;

use App\AddPrice;
use App\BodyType;
use App\Http\Requests\CarDetailsRequest;
use App\Http\Requests\CreateVehicleContactRequest;
use App\Repositories\AreasRepository;
use App\Repositories\BodyTypeRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarSeriesRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\DriveSetUpRepository;
use App\Repositories\DriveTypeRepository;
use App\Repositories\DutyRepository;
use App\Repositories\FuelTypeRepository;
use App\Repositories\InteriorRepository;
use App\Repositories\TransmissionTypeRepository;
use App\Repositories\VehicleContactRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleFeaturesRepository;
use App\Repositories\VehicleImagesRepository;
use App\Repositories\VehicleVerificationsRepository;
use App\VehiclePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
                           VehicleFeaturesRepository $vehicleFeaturesRepository,
                           DriveSetUpRepository $driveSetUpRepository,
                           DriveTypeRepository $driveTypeRepository){

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

        $drive_setups = $driveSetUpRepository->index();

        $drive_types = $driveTypeRepository->index();

        $door_counts = [
            [
                'slug' => 1,
                'description' => 1
            ],
            [
                'slug' => 2,
                'description' => 2
            ],
            [
                'slug' => 3,
                'description' => 3
            ],
            [
                'slug' => 4,
                'description' => 4
            ],
            [
                'slug' => 5,
                'description' => 5
            ],
            [
                'slug' => 6,
                'description' => 6
            ],
            [
                'slug' => 7,
                'description' => 7
            ],
            [
                'slug' => 8,
                'description' => 8
            ],
            [
                'slug' => 9,
                'description' => 9
            ],
            [
                'slug' => 10,
                'description' => 10
            ]
        ];

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
            'vehicle_features',
            'drive_types',
            'drive_setups',
        'door_counts'));
    }

    public function store(CarDetailsRequest $carDetailsRequest,
                          VehicleDetailRepository $vehicleDetailRepository,
                          VehicleVerificationsRepository $vehicleVerificationsRepository){

        $vehicle_detail = $vehicleDetailRepository->store($carDetailsRequest->all(),
            new CarMakeRepository(),
            new CarModelRepository(),
            new CarSeriesRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository());


        $vehicleVerificationsRepository->store($vehicle_detail, 'not_verified');

        return redirect()->route('createVehiclePictures',  $vehicle_detail->id);
    }


    public function createPictures($vehicleId){

        return view('vehicles.create-pictures', compact('vehicleId'));
    }

    public function createContacts($vehicleId,
                                   AreasRepository $areasRepository,
                                   VehicleImagesRepository $vehicleImagesRepository,
                                   VehicleDetailRepository $vehicleDetailRepository){

        $areas = $areasRepository->index();

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $result = $vehicleImagesRepository->checkIfImagesExist($vehicleId);

        if($result == false){

            flash()->overlay('Please Upload all the required images to continue', 'Warning: Upload IMages');

            return redirect()->back();
        }

        return view('vehicles.create-contacts', compact('vehicleId', 'areas', 'vehicle_detail'));
    }

    public function createAd($vehicleId,
                             VehicleDetailRepository $vehicleDetailRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $standard_ads = AddPrice::where('type', 'standard')->get();

        $premium_ads = AddPrice::where('type', 'premium')->get();

        return view('vehicles.create-ad', compact('vehicleId',
            'vehicle_detail',
            'standard_ads',
            'premium_ads'));
    }

    public function renewSingleAd($vehicleId,
                                  VehicleDetailRepository $vehicleDetailRepository){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $standard_ads = AddPrice::where('type', 'standard')->get();

        $premium_ads = AddPrice::where('type', 'premium')->get();

        return view('vehicles.renew-single-ad', compact('vehicleId',
            'vehicle_detail',
            'standard_ads',
            'premium_ads'));
    }


    public function publishVehicleAd($vehicleId,
                                     VehicleDetailRepository $vehicleDetailRepository){


        if(VehiclePayment::where('vehicle_detail_id', $vehicleId)
            ->where('status', 'not_paid')
            ->exists()){

            flash()->overlay('Please Complete Payment to Continue', 'Payment not Completed');

            return redirect()->back();
        }



        return view('vehicles.publish-ad');
    }

    public function storeVehicleContacts(CreateVehicleContactRequest $request,
                                         VehicleContactRepository $vehicleContactRepository,
                                         VehicleDetailRepository $vehicleDetailRepository,
                                         $vehicleId
    ){

        $vehicle_detail = $vehicleDetailRepository->show($vehicleId);

        $vehicleContactRepository->store($request->all(), $vehicle_detail, $vehicleId);

        return redirect()->route('createAd', $vehicleId);
    }



}
