<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 10:29 AM
 */

namespace App\Repositories;


use App\Duty;

class DutyRepository
{
    public function index(){
        return Duty::all();
    }
}