<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 12:24 PM
 */

namespace App\Repositories;


use App\ColourType;

class ColourTypeRepository
{
    public function index(){
        return ColourType::all();
    }
}