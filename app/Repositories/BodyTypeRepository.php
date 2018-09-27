<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 8:09 AM
 */

namespace App\Repositories;


use App\BodyType;

class BodyTypeRepository
{
    public function index(){

        return BodyType::all();
    }
}