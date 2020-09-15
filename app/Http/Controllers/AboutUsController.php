<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function showAboutUsPage(){


        return view('about-us');
    }

    public function showContactUsPage(){

        return view('contact-us');
    }

    public function termsAndConditionsPage(){

        return view('terms-and-conditions');
    }
}
