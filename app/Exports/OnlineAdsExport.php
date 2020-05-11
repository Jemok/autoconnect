<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class OnlineAdsExport implements FromView
{
    public function view(): View
    {
        return view('reports.online-ads-excel', [
            'users' => User::all()
        ]);
    }
}
