<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/18
 * Time: 11:54 AM
 */

namespace App\Repositories;


use App\Interior;

class InteriorRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(){
        return Interior::all();
    }
}