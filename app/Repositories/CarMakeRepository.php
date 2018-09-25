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
    public function index(){

        return CarMake::all();
    }
}