<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/6/19
 * Time: 9:40 AM
 */

namespace App\Repositories;


use App\DriveType;

class DriveTypeRepository
{

    public function showFromSlug($drive_type){
        return DriveType::where('slug', $drive_type)->firstOrFail();
    }

    public function index(){
        return DriveType::all();
    }
}