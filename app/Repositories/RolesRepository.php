<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/9/18
 * Time: 11:41 AM
 */

namespace App\Repositories;


use App\ModelHasRole;
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

    public function showAllUsersForRole($roleId){

        return ModelHasRole::where('role_id', $roleId)
            ->with('user')
            ->get();
    }
}