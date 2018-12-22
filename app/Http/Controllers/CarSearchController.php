<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarSearchController extends Controller
{
    public function showSearchResults(){

        return view('front.car-search-results');
    }
}
