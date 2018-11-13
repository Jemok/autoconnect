<?php

namespace App\Http\Controllers;

use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function indexDealers(RolesRepository $rolesRepository){

        $dealer_role = $rolesRepository->showFromName('dealer');

        $dealer_roles = $rolesRepository->showAllUsersForRole($dealer_role->id);

        return view('users.index-dealers', compact('dealer_roles'));
    }

    public function verifyUser($userId,
                               $status,
                               UserRepository $userRepository
    ){

            $userRepository->updateVerificationStatus($userId, $status);

            flash()->overlay('The user status was updated', 'Success');

            return redirect()->back();
    }
}
