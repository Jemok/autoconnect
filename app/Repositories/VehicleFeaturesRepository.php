<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 2:25 PM
 */

namespace App\Repositories;


use App\VehicleFeature;

class VehicleFeaturesRepository
{
    public function index(){
        return VehicleFeature::all();
    }
}