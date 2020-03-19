<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class OnlineAdsExport implements FromView
{
    public function view(): View
    {
        return view('reports.online-ads-excel');
    }

}
