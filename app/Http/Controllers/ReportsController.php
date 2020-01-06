<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function indexAll(){

        return view('reports.index-all');
    }

    public function financialReport(){


        return view('reports.financial');
    }
}
