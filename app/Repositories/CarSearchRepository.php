<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/2/19
 * Time: 10:36 AM
 */

namespace App\Repositories;


use App\BodyType;
use App\CarCondition;
use App\CarMake;
use App\CarModel;
use App\ColourType;
use App\FuelType;
use App\TransmissionType;
use App\VehicleDetail;

class CarSearchRepository
{
    public function searchCar($car_make,
                              $car_model,
                              $year_from,
                              $year_to,
                              $min_price,
                              $max_price,
                              $keyword,
                              $location,
                              $body_type,
                              $colour_type,
                              $transmission_type,
                              $car_condition,
                              $fuel_type){

        if($car_make != 'any_make'
            && $car_model != 'any_model'){

            $car_make_id = CarMake::where('slug', $car_make)->firstOrFail()->id;

            $car_model_id = CarModel::where('slug', $car_model)->firstOrFail()->id;

            if($body_type != 'any_body_type'){
                $body_type_id = BodyType::where('slug', $body_type)->firstOrFail()->id;
            }else{
                $body_type_id = null;
            }

            if($transmission_type != 'any_transmission'){
                $transmission_type_id = TransmissionType::where('slug', $transmission_type)->firstOrFail()->id;
            }else{
                $transmission_type_id = null;
            }

            if($colour_type != 'any_colour_type'){

                $colour_type_id = ColourType::where('slug', $colour_type)->firstOrFail()->id;
            }else{
                $colour_type_id = null;
            }

            if($car_condition != 'any_condition'){
                $car_condition_id = CarCondition::where('slug', $car_condition)->firstOrFail()->id;
            }else{
                $car_condition_id = null;
            }

            if($fuel_type != 'any_fuel_type'){
                $fuel_type_id = FuelType::where('slug', $fuel_type)->firstOrFail()->id;
            }else{
                $fuel_type_id = null;
            }

            $vehicles = VehicleDetail::where('car_make_id', $car_make_id)
                ->where('car_model_id', $car_model_id)->orWhereBetween('year', [$year_from, $year_to])
                ->orWhereBetween('price', [$min_price, $max_price])
                ->orWhere('body_type_id', $body_type_id)
                ->orWhere('transmission_type_id', $transmission_type_id)
                ->orWhere('colour_type_id', $colour_type_id)
                ->orWhere('car_condition_id', $car_condition_id)
                ->orWhere('fuel_type', $fuel_type_id)
                ->get();

            return $vehicles;
        }

        return VehicleDetail::all();
    }

}