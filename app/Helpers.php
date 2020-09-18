<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/2/19
 * Time: 11:48 AM
 */

function getVehicleFrontImage($vehicleDetailId){


    if(\App\VehicleImage::where('vehicle_detail_id', $vehicleDetailId)
        ->where('image_area', 'frontImage')
        ->exists()){

        $vehicle_front_image = \App\VehicleImage::where('vehicle_detail_id', $vehicleDetailId)
            ->where('image_area', 'frontImage')
            ->firstOrFail();

        return $vehicle_front_image->image_name;
    }

    return 'front.png';

}

function getBulkVehicleFrontImage($userBulkImportId){


    if(\App\BulkImportImage::where('user_bulk_import_id', $userBulkImportId)
        ->where('image_area', 'frontImage')
        ->exists()){

        $vehicle_front_image = \App\BulkImportImage::where('user_bulk_import_id', $userBulkImportId)
            ->where('image_area', 'frontImage')
            ->firstOrFail();

        return $vehicle_front_image->image_name;
    }

    return 'front.png';

}

function checkIfAdIsBulk($vehicleDetailId){

    if(\App\BulkAd::where('vehicle_detail_id', $vehicleDetailId)->exists()){
        return \App\BulkAd::where('vehicle_detail_id', $vehicleDetailId)->firstOrFail();
    }

    return false;
}


function showSimilarAdsForAd($car_make,
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


    if($car_make != 'any_make' && $car_model != null){

        $car_make_id = \App\CarMake::where('slug', $car_make)->firstOrFail()->id;

        if ($car_model != 'any_model'){
            $car_model_id = \App\CarModel::where('slug', $car_model)->firstOrFail()->id;
        }


        if($body_type != 'any_body_type' && $body_type != null){
            $body_type_id = \App\BodyType::where('slug', $body_type)->firstOrFail()->id;
        }else{
            $body_type_id = null;
        }

        if($transmission_type != 'any_transmission' && $transmission_type != null){
            $transmission_type_id = \App\TransmissionType::where('slug', $transmission_type)->firstOrFail()->id;
        }else{
            $transmission_type_id = null;
        }

        if($colour_type != 'any_colour_type' && $colour_type != null){

            $colour_type_id = \App\ColourType::where('slug', $colour_type)->firstOrFail()->id;
        }else{
            $colour_type_id = null;
        }

        if($car_condition != 'any_condition' && $car_condition != null){
            $car_condition_id = \App\CarCondition::where('slug', $car_condition)->firstOrFail()->id;
        }else{
            $car_condition_id = null;
        }

        if($fuel_type != 'any_fuel_type' && $fuel_type != null){
            $fuel_type_id = \App\FuelType::where('slug', $fuel_type)->firstOrFail()->id;
        }else{
            $fuel_type_id = null;
        }

        if ($car_model != 'any_model' && $car_model != null) {

            $raw_vehicles = \App\VehicleDetail::where('car_make_id', $car_make_id)
                ->where('car_model_id', $car_model_id)
                ->where('status', 'active');
        }else{

            $raw_vehicles = \App\VehicleDetail::where('car_make_id', $car_make_id)
                ->where('status', 'active');
        }

        $vehicles = $raw_vehicles->get();
//            $raw_vehicles->orWhereBetween('year', [$year_from, $year_to])
//            ->orWhereBetween('price', [$min_price, $max_price])
//            ->orWhere('body_type_id', $body_type_id)
//            ->orWhere('transmission_type_id', $transmission_type_id)
//            ->orWhere('colour_type_id', $colour_type_id)
//            ->orWhere('car_condition_id', $car_condition_id)
//            ->orWhere('fuel_type', $fuel_type_id)
//            ->get();

        $filtered_online_vehicles = $vehicles->filter(function ($value, $key) {

            if(\App\AdStatus::where('vehicle_detail_id', $value->id)->exists()){

                $ad_status = \App\AdStatus::where('vehicle_detail_id', $value->id)->firstOrFail();

                if($ad_status->status == 'online'){

                    return true;

                }
            }
        });


        return $filtered_online_vehicles;

    }elseif ($car_make == 'any_make' && $car_model == null){

        return \App\VehicleDetail::where('status', 'inactive')->take(7)->get();

    }
}


function checkIfCarFeatureInArray($vehicle_feature_slug, $selected_vehicle_features_array){


    foreach ($selected_vehicle_features_array as $key => $value){

        if($value != null){
            if($vehicle_feature_slug == $value){
                return true;
            }
        }
    }

    return false;
}
