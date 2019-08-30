<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarDetailsRequest;
use App\Repositories\BodyTypeRepository;
use App\Repositories\BulkImportRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarSeriesRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\DutyRepository;
use App\Repositories\FuelTypeRepository;
use App\Repositories\InteriorRepository;
use App\Repositories\TransmissionTypeRepository;
use App\Repositories\VehicleDetailRepository;
use App\Repositories\VehicleFeaturesRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EditVehicleController extends Controller
{
    public function editUserBothImportVehicle($vehicleDetailId,
                                              $userBulkImportId,
                                              $bulkImportId,
                                              BulkImportRepository $bulkImportRepository,
                                              CarMakeRepository $carMakeRepository,
                                              CarModelRepository $carModelRepository,
                                              BodyTypeRepository $bodyTypeRepository,
                                              TransmissionTypeRepository $transmissionTypeRepository,
                                              CarConditionRepository $carConditionRepository,
                                              DutyRepository $dutyRepository,
                                              FuelTypeRepository $fuelTypeRepository,
                                              InteriorRepository $interiorRepository,
                                              ColourTypeRepository $colourTypeRepository,
                                              VehicleFeaturesRepository $vehicleFeaturesRepository){

        $user_bulk_import = $bulkImportRepository->showSingleBulkImport($userBulkImportId, $bulkImportId);

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

        $selected_vehicle_features_json = $user_bulk_import->other_features;

        $selected_vehicle_features_array = json_decode($selected_vehicle_features_json, true);


        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        return view('vehicles.edit-both-vehicle', compact('user_bulk_import',
            'car_makes',
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
            'selected_vehicle_features_array',
            'vehicleDetailId'));
    }

    public function updateUserBothBulkImportVehicle(CarDetailsRequest $carDetailsRequest,
                                                BulkImportRepository $bulkImportRepository,
                                                VehicleDetailRepository $vehicleDetailRepository,
                                                $vehicleDetailId,
                                                $userBulkImportId,
                                                $bulkImportId){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->storeBulkImports($carDetailsRequest->all(),
            $bulkImportId,
            $user_bulk_import->id,
            new CarMakeRepository(),
            new CarModelRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository(),
            $userBulkImportId);

        $vehicleDetail = $vehicleDetailRepository->show($vehicleDetailId);

        $vehicle_detail = $vehicleDetailRepository->store($carDetailsRequest->all(),
            new CarMakeRepository(),
            new CarModelRepository(),
            new CarSeriesRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository(),
            $vehicleDetailId);

        flash()->overlay('Car details updated successfully', 'Success');

        return redirect()->back();
    }


    public function editUserBulkImportVehicle($userBulkImportId,
                                              $bulkImportId,
                                              BulkImportRepository $bulkImportRepository,
                                              CarMakeRepository $carMakeRepository,
                                              CarModelRepository $carModelRepository,
                                              BodyTypeRepository $bodyTypeRepository,
                                              TransmissionTypeRepository $transmissionTypeRepository,
                                              CarConditionRepository $carConditionRepository,
                                              DutyRepository $dutyRepository,
                                              FuelTypeRepository $fuelTypeRepository,
                                              InteriorRepository $interiorRepository,
                                              ColourTypeRepository $colourTypeRepository,
                                              VehicleFeaturesRepository $vehicleFeaturesRepository){

        $user_bulk_import = $bulkImportRepository->showSingleBulkImport($userBulkImportId, $bulkImportId);

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

        $selected_vehicle_features_json = $user_bulk_import->other_features;

        $selected_vehicle_features_array = json_decode($selected_vehicle_features_json, true);



        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        return view('vehicles.edit-vehicle', compact('user_bulk_import',
            'car_makes',
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
            'selected_vehicle_features_array'));
    }

    public function updateUserBulkImportVehicle(CarDetailsRequest $carDetailsRequest,
                                                BulkImportRepository $bulkImportRepository,
                                                $userBulkImportId,
                                                $bulkImportId){

        $user_bulk_import = $bulkImportRepository->show($userBulkImportId);

        $bulkImportRepository->storeBulkImports($carDetailsRequest->all(),
            $bulkImportId,
            $user_bulk_import->id,
            new CarMakeRepository(),
            new CarModelRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository(),
            $userBulkImportId);

        flash()->overlay('Car details updated successfully', 'Success');

        return redirect()->back();
    }

    public function updateUserSingleImportVehicle(CarDetailsRequest $carDetailsRequest,
                                                  VehicleDetailRepository $vehicleDetailRepository,
                                                  $vehicleDetailId){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleDetailId);

        $vehicle_detail = $vehicleDetailRepository->store($carDetailsRequest->all(),
            new CarMakeRepository(),
            new CarModelRepository(),
            new CarSeriesRepository(),
            new BodyTypeRepository(),
            new TransmissionTypeRepository(),
            new CarConditionRepository(),
            new DutyRepository(),
            new ColourTypeRepository(),
            $vehicleDetailId);

        flash()->overlay('Car details updated successfully', 'Success');

        return redirect()->back();
    }

    public function editUserSingleImportVehicle($vehicleDetailId,
                                                VehicleDetailRepository $vehicleDetailRepository,
                                                CarMakeRepository $carMakeRepository,
                                                CarModelRepository $carModelRepository,
                                                BodyTypeRepository $bodyTypeRepository,
                                                TransmissionTypeRepository $transmissionTypeRepository,
                                                CarConditionRepository $carConditionRepository,
                                                DutyRepository $dutyRepository,
                                                FuelTypeRepository $fuelTypeRepository,
                                                InteriorRepository $interiorRepository,
                                                ColourTypeRepository $colourTypeRepository,
                                                VehicleFeaturesRepository $vehicleFeaturesRepository){

        $vehicleDetail = $vehicleDetailRepository->show($vehicleDetailId);

        $user_bulk_import = $vehicleDetail;

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

        $selected_vehicle_features_json = $user_bulk_import->other_features;

        $selected_vehicle_features_array = json_decode($selected_vehicle_features_json, true);

        $start_year = 1900;
        $next_year = Carbon::now()->year + 1;

        return view('single-ads.edit-single-vehicle', compact('vehicleDetail', 'car_makes',
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
            'selected_vehicle_features_array'));
    }
}
