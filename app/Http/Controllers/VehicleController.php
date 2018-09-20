<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create(){

        return view('vehicles.create');
    }

    public function createPictures(){

        return view('vehicles.create-pictures');
    }

    public function createContacts(){

        return view('vehicles.create-contacts');
    }

    public function createAd(){

        return view('vehicles.create-ad');
    }

    public function publishVehicleAd(){

        return view('vehicles.publish-ad');
    }
}
