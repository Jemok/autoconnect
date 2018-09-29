<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 8:26 AM
 */

namespace App\Repositories;


use App\TransmissionType;

class TransmissionTypeRepository
{
    public function showFromSlug($transmission_type){
        return TransmissionType::where('slug', $transmission_type)->firstOrFail();
    }

    public function index(){

        return TransmissionType::all();
    }
}