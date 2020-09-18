<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/25/18
 * Time: 4:09 PM
 */

use App\CarMake;


class CarMakeRepository
{

    public function showFromSlug($car_make){
        return CarMake::where('slug', $car_make)->firstOrFail();
    }

    public function index(){

        return CarMake::paginate(25);
    }

    public function indexAll(){

        return CarMake::all();
    }
}
