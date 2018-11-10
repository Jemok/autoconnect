<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/27/18
 * Time: 1:56 PM
 */

namespace App\Repositories;


use App\BulkImport;
use App\BulkImportStatus;
use App\User;
use App\UserBulkImport;

class BulkImportRepository
{
    public function store(User $user){

        return $user->bulk_import()->save(new BulkImport());
    }

    /**
     * @param $bulkImportId
     * @return mixed
     */
    public function showBulkImport($bulkImportId){

        return BulkImport::where('id', $bulkImportId)->firstOrFail();
    }

    public function storeBulkImportStatus($bulk_import, $status){

        if(BulkImportStatus::where('bulk_import_id', $bulk_import->id)->exists()){

            $bulk_import_status = BulkImportStatus::where('bulk_import_id', $bulk_import->id)->firstOrFail();

            $bulk_import_status->status = $status;
            $bulk_import_status->bulk_import_id = $bulk_import->id;

            $bulk_import_status->save();

            return $bulk_import_status;
        }

        $bulk_import_status = new BulkImportStatus();

        $bulk_import_status->status = $status;
        $bulk_import_status->bulk_import_id = $bulk_import->id;

        $bulk_import_status->save();

        return $bulk_import_status;
    }

    public function storeBulkImports(array $data,
                                     $bulk_import_id,
                                     CarMakeRepository $carMakeRepository,
                                     CarModelRepository $carModelRepository,
                                     BodyTypeRepository $bodyTypeRepository,
                                     TransmissionTypeRepository $transmissionTypeRepository,
                                     CarConditionRepository $carConditionRepository,
                                     DutyRepository $dutyRepository,
                                     ColourTypeRepository $colourTypeRepository){

        $car_make = array_key_exists('car_make', $data) ? $data['car_make'] : null;
        $car_make_model = $carMakeRepository->showFromSlug($car_make);
        $car_model = array_key_exists('car_model', $data) ? $data['car_model'] : null;
        $car_model_model = $carModelRepository->showFromSlug($car_model);
        $year = array_key_exists('year', $data)? $data['year'] : null;
        $mileage = array_key_exists('mileage', $data) ? $data['mileage'] : null;
        $body_type = array_key_exists('body_type', $data) ? $data['body_type'] : null;
        $body_type_model =  $bodyTypeRepository->showFromSlug($body_type);
        $transmission_type = array_key_exists('transmission_type', $data) ? $data['transmission_type'] : null;
        $transmission_type_model = $transmissionTypeRepository->showFromSlug($transmission_type);
        $condition = array_key_exists('car_condition', $data) ? $data['car_condition'] : null;
        $condition_model = $carConditionRepository->showFromSlug($condition);
        $duty = array_key_exists('duty', $data) ? $data['duty'] : null;
        $duty_model = $dutyRepository->showFromSlug($duty);
        $price = array_key_exists('price', $data) ? $data['price'] : null;
        $negotiable_price = array_key_exists('negotiable_price', $data) ? $data['negotiable_price'] : 'not_allowed';
        $fuel_type = array_key_exists('fuel_type', $data) ? $data['fuel_type'] : null;
        $engine_size = array_key_exists('engine_size', $data) ? $data['engine_size'] : null;
        $interior = array_key_exists('interior', $data) ? $data['interior'] : null;
        $colour_type = array_key_exists('colour_type', $data) ? $data['colour_type'] : 'other';
        $colour_type_model = $colourTypeRepository->showFromSlug($colour_type);
        $description = array_key_exists('description', $data) ? $data['description'] : null;

        $other_features = json_encode([
            'Air Conditioning' => array_key_exists('air_conditioning', $data) ? $data['air_conditioning'] : null,
            'Air Bags' => array_key_exists('air_bags', $data) ?  $data['air_bags'] : null,
            'Alloy Wheels' => array_key_exists('alloy_wheels', $data) ? $data['alloy_wheels'] : null,
            'AM and FM Radio' => array_key_exists('am_fm_radio', $data) ? $data['am_fm_radio'] : null,
            'Anti Lock Brakes' => array_key_exists('anti_lock_brakes', $data) ?  $data['anti_lock_brakes'] : null,
            'Armrests' => array_key_exists('armrests', $data) ? $data['armrests'] : null,
            'Bullbar' => array_key_exists('bullbar', $data) ?  $data['bullbar'] : null,
            'Bulletproof' => array_key_exists('bulletproof', $data) ? $data['bulletproof'] : null,
            'CD Player' => array_key_exists('cd_player', $data) ? $data['cd_player'] : null,
            'Cup Holders' => array_key_exists('cup_holders', $data) ? $data['cup_holders'] :  null,
            'Electric Mirrors' => array_key_exists('electric_mirrors', $data) ? $data['electric_mirrors'] : null,
            'Electric Windows' => array_key_exists('electric_windows', $data) ? $data['electric_windows'] :  null,
            'External Winch' => array_key_exists('external_winch', $data) ? $data['external_winch'] :  null,
            'Fog Lights' => array_key_exists('fog_lights', $data) ? $data['fog_lights'] :  null,
            'Front Fog Lamps' => array_key_exists('front_fog_lamps', $data) ? $data['front_fog_lamps'] : null,
            'Keyless Entry' => array_key_exists('keyless_entry', $data) ? $data['keyless_entry'] :  null,
            'Power Steering' => array_key_exists('power_steering', $data) ? $data['power_steering'] : null,
            'Rear Camera' => array_key_exists('rear_camera', $data) ? $data['rear_camera'] : null,
            'Roof Rack' => array_key_exists('roof_rack', $data) ? $data['roof_rack'] :  null,
            'Side Steps' => array_key_exists('sidesteps', $data) ? $data['sidesteps'] :  null,
            'Spoilers' => array_key_exists('spoilers', $data) ? $data['spoilers'] :  null,
            'Spotlight' => array_key_exists('spotlight', $data) ? $data['spotlight'] :  null,
            'Sunroof' => array_key_exists('sunroof', $data) ? $data['sunroof'] : null,
            'Thubstart Ignition' => array_key_exists('thumbstart_ignition', $data) ? $data['thumbstart_ignition'] : null,
            'Tinted Windows' => array_key_exists('tinted_windows', $data) ? $data['tinted_windows'] : null,
            'Traction Control' => array_key_exists('traction_control', $data) ? $data['traction_control'] : null,
            'Turbo Charged' => array_key_exists('turbo_charged', $data) ? $data['turbo_charged'] : null,
            'Wheel Locks' => array_key_exists('wheel_locks', $data) ? $data['wheel_locks'] : null,
            'Winch' => array_key_exists('winch', $data) ? $data['winch'] : null,
            'Xenon Lights' => array_key_exists('xenon_lights', $data) ? $data['xenon_lights'] : null
        ]);

        $vehicle_detail = new UserBulkImport();

        $vehicle_detail->car_make_id = $car_make_model->id;
        $vehicle_detail->car_model_id = $car_model_model->id;
        $vehicle_detail->year = $year;
        $vehicle_detail->mileage = $mileage;
        $vehicle_detail->body_type_id = $body_type_model->id;
        $vehicle_detail->transmission_type_id = $transmission_type_model->id;
        $vehicle_detail->car_condition_id = $condition_model->id;
        $vehicle_detail->duty_id = $duty_model->id;
        $vehicle_detail->price = $price;
        $vehicle_detail->negotiable_price = $negotiable_price;
        $vehicle_detail->fuel_type = $fuel_type;
        $vehicle_detail->engine_size = $engine_size;
        $vehicle_detail->interior = $interior;
        $vehicle_detail->colour_type_id = $colour_type_model->id;
        $vehicle_detail->description = $description;
        $vehicle_detail->other_features = $other_features;
        $vehicle_detail->bulk_import_id = $bulk_import_id;

        $vehicle_detail->save();

        return $vehicle_detail;
    }

    public function indexFroBulkImport($bulkImportId){

        return UserBulkImport::where('bulk_import_id', $bulkImportId)->get();
    }

    public function showSingleBulkImport($singleBulkImportId,
                                         $bulkImportId){

        return UserBulkImport::where('id', $singleBulkImportId)
            ->where('bulk_import_id', $bulkImportId)
            ->firstOrFail();

    }

    public function show($singleBulkImportId){

        return UserBulkImport::where('id', $singleBulkImportId)
            ->firstOrFail();
    }

    public function indexForPayments(){

        return BulkImportStatus::where('status', 'payment')->latest()->get();
    }

    public function indexForUser($userId){

        return BulkImport::where('user_id', $userId)->latest()->get();

    }

}