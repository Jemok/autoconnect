<?php

namespace App\Exports;

use App\Repositories\AdStatusRepository;
use App\Repositories\BulkImportRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DeclinedAdsExport implements FromView
{
    public function view(): View
    {
        $bulkImportRepository = new BulkImportRepository();

        $disapproval_reasons = $bulkImportRepository->getAllSubmittedCorrections();

        return view('reports.online-ads-excel', [
            'declined_ads' => $disapproval_reasons
        ]);
    }
}
