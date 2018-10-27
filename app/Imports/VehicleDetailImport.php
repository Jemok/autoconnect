<?php

namespace App\Imports;

use App\Repositories\BodyTypeRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\ColourTypeRepository;
use App\Repositories\DutyRepository;
use App\Repositories\TransmissionTypeRepository;
use App\UserBulkImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleDetailsImport implements ToCollection, WithHeadingRow
{
    protected $bulkImportId;

    protected $userId;

    public function __construct($bulkImportId, $userId)
    {
        $this->bulkImportId = $bulkImportId;
        $this->userId = $userId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $data)
        {
            $carMakeRepository = new CarMakeRepository();
            $carModelRepository = new CarModelRepository();
            $bodyTypeRepository = new BodyTypeRepository();
            $transmissionTypeRepository = new TransmissionTypeRepository();
            $carConditionRepository = new CarConditionRepository();
            $dutyRepository = new DutyRepository();
            $colourTypeRepository = new ColourTypeRepository();

            $car_make = $data['car_make_id'];
            $car_make_model = $carMakeRepository->showFromSlug($car_make);
            $car_model = $data['car_model_id'];
            $car_model_model = $carModelRepository->showFromSlug($car_model);
            $year = $data['year'];
            $mileage = $data['mileage'];
            $body_type = $data['body_type_id'];
            $body_type_model = $bodyTypeRepository->showFromSlug($body_type);
            $transmission_type = $data['transmission_type_id'];
            $transmission_type_model = $transmissionTypeRepository->showFromSlug($transmission_type);
            $condition = $data['car_condition_id'];
            $condition_model = $carConditionRepository->showFromSlug($condition);
            $duty = $data['duty_id'];
            $duty_model = $dutyRepository->showFromSlug($duty);
            $price = $data['price'];
            $negotiable_price = array_key_exists('negotiable_price', $data) ? $data['negotiable_price'] : 'not_allowed';
            $fuel_type = array_key_exists('fuel_type', $data) ? $data['fuel_type'] : null;
            $engine_size = array_key_exists('engine_size', $data) ? $data['engine_size'] : null;
            $interior = array_key_exists('interior', $data) ? $data['interior'] : null;
            $colour_type = array_key_exists('colour_type', $data) ? $data['colour_type'] : 'other';
            $colour_type_model = $colourTypeRepository->showFromSlug($colour_type);
            $description = $data['description'];

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
            $vehicle_detail->bulk_import_id = $this->bulkImportId;
            $vehicle_detail->user_id = $this->userId;

            $vehicle_detail->save();
        }
    }
}