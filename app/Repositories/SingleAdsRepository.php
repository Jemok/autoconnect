<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/29/18
 * Time: 8:07 AM
 */

namespace App\Repositories;


use App\VehicleDetail;

class SingleAdsRepository
{
    public function index(){

        return VehicleDetail::latest()->get();

    }
}