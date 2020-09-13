<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 9:49 AM
 */

namespace App\Repositories;


use App\Area;

class AreasRepository
{
    public function index(){

        return Area::where('name', 'NAIROBI CITY')
                     ->orWhere('name', 'KISUMU')
            ->orWhere('name', 'MOMBASA')
            ->orWhere('name', 'NAKURU')
            ->orWhere('name', 'ELDORET')
            ->get();
    }
}
