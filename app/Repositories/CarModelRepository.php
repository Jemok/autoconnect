<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/25/18
 * Time: 4:10 PM
 */

namespace App\Repositories;

use App\CarModel;

class CarModelRepository
{

    public function showFromSlug($car_model){
        return CarModel::where('slug', $car_model)->firstOrFail();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){

        return CarModel::all();
    }
}