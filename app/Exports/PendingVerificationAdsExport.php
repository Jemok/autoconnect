<?php

namespace App\Exports;

use App\Repositories\AdStatusRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PendingVerificationAdsExport implements FromView
{
    public function view(): View
    {
        $adStatusRepository = new AdStatusRepository();

        $single_ads = $adStatusRepository->indexPendingVerificationAds();;

        return view('reports.pending-verification-ads-excel', [
            'pending_verification_ads' => $single_ads
        ]);
    }
}
