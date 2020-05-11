<?php

namespace App\Exports;

use App\Repositories\AdStatusRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpiredAdsExport implements FromView
{
    public function view(): View
    {
        $adStatusRepository = new AdStatusRepository();

        $expired_ads = $adStatusRepository->indexExpiredAds();

        return view('reports.expired-ads-excel', [
            'expired_ads' => $expired_ads
        ]);
    }
}
