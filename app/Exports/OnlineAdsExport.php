<?php

namespace App\Exports;

use App\Repositories\AdStatusRepository;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class OnlineAdsExport implements FromView
{
    public function view(): View
    {
        $adStatusRepository = new AdStatusRepository();

        $single_ads = $adStatusRepository->indexOnlineAds();

        return view('reports.online-ads-excel', [
            'online_ads' => $single_ads
        ]);
    }
}
