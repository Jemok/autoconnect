<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/29/18
 * Time: 6:21 AM
 */

namespace App\Repositories;


use App\VehicleDetail;

class VehicleDetailRepository
{
    public function show($vehicleId){

        return VehicleDetail::where('id', $vehicleId)->firstOrFail();
    }

    public function store(array $data,
                          CarMakeRepository $carMakeRepository,
                          CarModelRepository $carModelRepository,
                          BodyTypeRepository $bodyTypeRepository,
                          TransmissionTypeRepository $transmissionTypeRepository,
                          CarConditionRepository $carConditionRepository,
                          DutyRepository $dutyRepository,
                          ColourTypeRepository $colourTypeRepository){

        $car_make = $data['car_make'];
        $car_make_model = $carMakeRepository->showFromSlug($car_make);
        $car_model = $data['car_model'];
        $car_model_model = $carModelRepository->showFromSlug($car_model);
        $year = $data['year'];
        $mileage = $data['mileage'];
        $body_type = $data['body_type'];
        $body_type_model = $bodyTypeRepository->showFromSlug($body_type);
        $transmission_type = $data['transmission_type'];
        $transmission_type_model = $transmissionTypeRepository->showFromSlug($transmission_type);
        $condition = $data['car_condition'];
        $condition_model = $carConditionRepository->showFromSlug($condition);
        $duty = $data['duty'];
        $duty_model = $dutyRepository->showFromSlug($duty);
        $price = $data['price'];
        $negotiable_price = array_key_exists('negotiable_price', $data) ? $data['negotiable_price'] : 'not_allowed';
        $fuel_type = $data['fuel_type'];
        $engine_size = $data['engine_size'];
        $interior = $data['interior'];
        $colour_type = $data['colour_type'];
        $colour_type_model = $colourTypeRepository->showFromSlug($colour_type);
        $description = $data['description'];

        $other_fearues = [
            array_key_exists('air_conditioning', $data) ? $data['air_conditioning'] : null,
            array_key_exists('air_bags', $data) ?  $data['air_bags'] : null,
            array_key_exists('alloy_wheels', $data) ? $data['alloy_wheels'] : null,
            array_key_exists('am_fm_radio', $data) ? $data['am_fm_radio'] : null,
            array_key_exists('anti_lock_brakes', $data) ?  $data['anti_lock_brakes'] : null,
            array_key_exists('armrests', $data) ? $data['armrests'] : null,
            array_key_exists('bullbar', $data) ?  $data['bullbar'] : null,
            array_key_exists('bulletproof', $data) ? $data['bulletproof'] : null,
            array_key_exists('cd_player', $data) ? $data['cd_player'] : null,
            array_key_exists('cup_holders', $data) ? $data['cup_holders'] :  null,
            array_key_exists('electric_mirrors', $data) ? $data['electric_mirrors'] : null,
            array_key_exists('electric_windows', $data) ? $data['electric_windows'] :  null,
            array_key_exists('external_winch', $data) ? $data['external_winch'] :  null,
            array_key_exists('fog_lights', $data) ? $data['fog_lights'] :  null,
            array_key_exists('front_fog_lamps', $data) ? $data['front_fog_lamps'] : null,
            array_key_exists('keyless_entry', $data) ? $data['keyless_entry'] :  null,
            array_key_exists('power_steering', $data) ? $data['power_steering'] : null,
            array_key_exists('rear_camera', $data) ? $data['rear_camera'] : null,
            array_key_exists('roof_rack', $data) ? $data['roof_rack'] :  null,
            array_key_exists('sidesteps', $data) ? $data['sidesteps'] :  null,
            array_key_exists('spoilers', $data) ? $data['spoilers'] :  null,
            array_key_exists('spotlight', $data) ? $data['spotlight'] :  null,
            array_key_exists('sunroof', $data) ? $data['sunroof'] : null,
            array_key_exists('thumbstart_ignition', $data) ? $data['thumbstart_ignition'] : null,
            array_key_exists('tinted_windows', $data) ? $data['tinted_windows'] : null,
            array_key_exists('traction_control', $data) ? $data['traction_control'] : null,
            array_key_exists('turbo_charged', $data) ? $data['turbo_charged'] : null,
            array_key_exists('wheel_locks', $data) ? $data['wheel_locks'] : null,
            array_key_exists('winch', $data) ? $data['winch'] : null,
            array_key_exists('xenon_lights', $data) ? $data['xenon_lights'] : null
        ];

        $vehicle_detail = new VehicleDetail();

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
        $vehicle_detail->other_features = json_encode($other_fearues);

        $vehicle_detail->save();

        return $vehicle_detail;
    }


}