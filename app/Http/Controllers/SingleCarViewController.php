<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleCarViewController extends Controller
{
    public function show(){

        return view('front.single-car-view');
    }
}
