<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 10:08 AM
 */

namespace App\Repositories;


use App\CarCondition;

class CarConditionRepository
{
    public function showFromSlug($condition){
        return CarCondition::where('slug', $condition)->firstOrFail();
    }

    public function index(){

        return CarCondition::all();
    }

}