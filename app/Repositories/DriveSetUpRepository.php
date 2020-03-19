<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/6/19
 * Time: 9:41 AM
 */

namespace App\Repositories;


use App\DriveSetUp;

class DriveSetUpRepository
{
    public function showFromSlug($drive_setup){
        return DriveSetUp::where('slug', $drive_setup)->firstOrFail();
    }

    public function index(){
        return DriveSetUp::all();
    }
}