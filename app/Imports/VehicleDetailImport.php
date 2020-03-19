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
        foreach ($rows as $key => $data)
        {
            $carMakeRepository = new CarMakeRepository();
            $carModelRepository = new CarModelRepository();
            $bodyTypeRepository = new BodyTypeRepository();
            $transmissionTypeRepository = new TransmissionTypeRepository();
            $carConditionRepository = new CarConditionRepository();
            $dutyRepository = new DutyRepository();
            $colourTypeRepository = new ColourTypeRepository();

            $car_make = $data->has('car_make_id') ? $data['car_make_id'] : null;
            $car_make_model = $carMakeRepository->showFromSlug($car_make);
            $car_model = $data->has('car_model_id') ? $data['car_model_id'] : null;
            $car_model_model = $carModelRepository->showFromSlug($car_model);
            $year = $data->has('year') ? $data['year'] :  null;
            $mileage = $data->has('mileage') ? $data['mileage'] : null;
            $body_type = $data->has('body_type_id') ? $data['body_type_id'] : null;
            $body_type_model = $bodyTypeRepository->showFromSlug($body_type);
            $transmission_type = $data->has('transmission_type_id') ? $data['transmission_type_id'] : null;
            $transmission_type_model = $transmissionTypeRepository->showFromSlug($transmission_type);
            $condition = $data->has('car_condition_id') ? $data['car_condition_id'] : null;
            $condition_model = $carConditionRepository->showFromSlug($condition);
            $duty = $data->has('duty_id') ? $data['duty_id'] : null;
            $duty_model = $dutyRepository->showFromSlug($duty);
            $price = $data->has('price') ? $data['price'] : null;
            $negotiable_price = $data->has('negotiable_price') ? $data['negotiable_price'] : 'not_allowed';
            $fuel_type = $data->has('fuel_type') ? $data['fuel_type'] : null;
            $engine_size = $data->has('engine_size') ? $data['engine_size'] : null;
            $interior = $data->has('interior') ? $data['interior'] : null;
            $colour_type = $data->has('colour_type') ? $data['colour_type'] : 'other';
            $colour_type_model = $colourTypeRepository->showFromSlug($colour_type);
            $description = $data->has('description') ? $data['description'] : null;

            $other_features = json_encode([
                'Air Conditioning' => $data->has('air_conditioning') ? $data['air_conditioning'] : null,
                'Air Bags' => $data->has('air_bags') ?  $data['air_bags'] : null,
                'Alloy Wheels' => $data->has('alloy_wheels') ? $data['alloy_wheels'] : null,
                'AM and FM Radio' => $data->has('am_fm_radio') ? $data['am_fm_radio'] : null,
                'Anti Lock Brakes' => $data->has('anti_lock_brakes') ?  $data['anti_lock_brakes'] : null,
                'Armrests' => $data->has('armrests') ? $data['armrests'] : null,
                'Bullbar' =>  $data->has('bullbar') ?  $data['bullbar'] : null,
                'Bulletproof' => $data->has('bulletproof') ? $data['bulletproof'] : null,
                'CD Player' => $data->has('cd_player') ? $data['cd_player'] : null,
                'Cup Holders' => $data->has('cup_holders') ? $data['cup_holders'] :  null,
                'Electric Mirrors' => $data->has('electric_mirrors') ? $data['electric_mirrors'] : null,
                'Electric Windows' => $data->has('electric_windows') ? $data['electric_windows'] :  null,
                'External Winch' => $data->has('external_winch') ? $data['external_winch'] :  null,
                'Fog Lights' =>  $data->has('fog_lights') ? $data['fog_lights'] :  null,
                'Front Fog Lamps' => $data->has('front_fog_lamps') ? $data['front_fog_lamps'] : null,
                'Keyless Entry' => $data->has('keyless_entry') ? $data['keyless_entry'] :  null,
                'Power Steering' => $data->has('power_steering') ? $data['power_steering'] : null,
                'Rear Camera' => $data->has('rear_camera') ? $data['rear_camera'] : null,
                'Roof Rack' => $data->has('roof_rack') ? $data['roof_rack'] :  null,
                'Side Steps' => $data->has('sidesteps') ? $data['sidesteps'] :  null,
                'Spoilers' => $data->has('spoilers') ? $data['spoilers'] :  null,
                'Spotlight' => $data->has('spotlight') ? $data['spotlight'] :  null,
                'Sunroof' => $data->has('sunroof') ? $data['sunroof'] : null,
                'Thubstart Ignition' => $data->has('thumbstart_ignition') ? $data['thumbstart_ignition'] : null,
                'Tinted Windows' => $data->has('tinted_windows') ? $data['tinted_windows'] : null,
                'Traction Control' => $data->has('traction_control') ? $data['traction_control'] : null,
                'Turbo Charged' => $data->has('turbo_charged') ? $data['turbo_charged'] : null,
                'Wheel Locks' => $data->has('wheel_locks') ? $data['wheel_locks'] : null,
                'Winch' => $data->has('winch') ? $data['winch'] : null,
                'Xenon Lights' => $data->has('xenon_lights') ? $data['xenon_lights'] : null
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
            $vehicle_detail->unique_identifier = 'UNI-'.rand(10000, 90000);

            $vehicle_detail->save();
        }
    }
}