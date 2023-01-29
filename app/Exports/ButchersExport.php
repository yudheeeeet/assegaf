<?php

namespace App\Exports;

use App\Models\Butcher;
use Maatwebsite\Excel\Concerns\FromCollection;

class ButchersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Butcher::all();
    }
}
