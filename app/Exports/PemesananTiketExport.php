<?php

namespace App\Exports;

use App\Models\PemesananTiket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PemesananTiketExport implements FromView
{
    use Exportable;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        $result = PemesananTiket::with(['paket'])->whereBetween('created_at', [$this->startDate, $this->endDate])->get();
        return view('tiket.export', [
            'tikets' => $result,
        ]);
    }
}
