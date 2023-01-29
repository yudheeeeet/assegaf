<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;

class MeatSaleExport implements FromCollection
{
    protected $item;

    function __construct($item)
    {
        $this->item = $item;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sale::select('item','customer','grade','kilos','price','total_price')->where('item',$this->item)->get();
    }
}
