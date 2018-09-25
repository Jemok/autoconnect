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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){

        return CarModel::all();
    }
}