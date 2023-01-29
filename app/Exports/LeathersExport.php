<?php

namespace App\Exports;

use App\Models\Leather;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeathersExport implements FromCollection
{

    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Leather::select('butcher_id','sheet','kilos','total_price')->where('butcher_id',$this->id)->get();
    }
}
