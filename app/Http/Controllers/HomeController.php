<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * Check if its for Admin, Dealer or Buyer, then
     * return appropriate view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('dealer')){
            return view('home');
        }

        if(Auth::user()->hasRole('super-admin')){
            return view('admin.home');
        }

        if(Auth::user()->hasRole('buyer')){
            return view('buyer.home');
        }

        return view('home');
    }
}
