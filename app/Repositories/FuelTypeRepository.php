<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 11:09 AM
 */

namespace App\Repositories;


use App\FuelType;

class FuelTypeRepository
{
    public function index(){
        return FuelType::all();
    }
}