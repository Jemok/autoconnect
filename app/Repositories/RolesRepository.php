<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/9/18
 * Time: 11:41 AM
 */

namespace App\Repositories;


use Spatie\Permission\Models\Role;

class RolesRepository
{
    /**
     * List all application roles
     * @return mixed
     */
    public function index(){

        return Role::latest()->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function showFromName($name){

        return Role::where('name', $name)->firstOrFail();
    }
}