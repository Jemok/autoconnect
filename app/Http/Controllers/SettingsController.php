<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){

        return view('settings.index');
    }


    public function updateAccount(UpdateSettingsRequest $request,
                                  SettingRepository $settingRepository){

        if(Hash::check($request->password, Auth::user()->password)){

            $settingRepository->update(Auth::user(), $request->all());

            flash('Account details updated.')->success();

            return redirect()->back();
        }

        flash('Wrong password.')->error();

        return redirect()->back();
    }

    public function updateEmail(UpdateEmailRequest $request){

        $user = Auth::user();

        $user->email = $request->email;

        if($request->path() === 'settings-email'){

            DB::transaction(function () use ($user){
                $user->save();
            });

            flash('Email updated .')->success();

            return redirect()->back();
        }

        if($this->checkConfirmation(Auth::user()->confirmation)){

            return redirect()->route('defaultOrganization');
        }

        DB::transaction(function () use ($user){
            $user->save();
        });

//        $message = 'A new email was sent to ' . Auth::user()->email;

        $message = 'Email Changed';

//        Auth::user()->notify(new EmailConfirmation($user, Auth::user()->confirmation));

        flash($message)->success();

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request){

        if(Hash::check($request->old_password, Auth::user()->password)){

            $user = Auth::user();

            $user->password = bcrypt($request->new_password);

            $user->save();

            flash('Password updated');

            return redirect()->back();
        }

        flash('Wrong password.')->error();

        return redirect()->back();
    }


}
