<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
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
     * Show the Buyer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buyer.home');
    }
}
