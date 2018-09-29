<?php

namespace App\Http\Controllers;

use App\Repositories\SingleAdsRepository;

class SingleAdsController extends Controller
{
    public function index(SingleAdsRepository $singleAdsRepository){

        $single_ads = $singleAdsRepository->index();

        return view('single-ads.index', compact('single_ads'));
    }
}
