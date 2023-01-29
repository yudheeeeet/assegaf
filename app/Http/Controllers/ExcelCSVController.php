<?php

namespace App\Http\Controllers;

use App\Exports\ButchersExport;
use App\Exports\LeatherSaleExport;
use App\Exports\LeathersExport;
use App\Exports\MeatSaleExport;
use App\Exports\PurchasesExport;
use App\Models\Butcher;
use App\Models\Leather;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ExcelCSVController extends Controller
{
    public function exportExcelCSV($slug, $id) 
    {
        return Excel::download(new LeathersExport($id), 'history.'.$slug);
    }

    public function exportPDF($id)
    {
        $data = Leather::select('id','butcher_id','sheet','kilos','total_price','created_at')->where('butcher_id',$id)->get();
        $butcher = Butcher::select('id','name')->where('id',$id)->first();
           
        $pdf = PDF::loadView('butcher.exportPDF', compact('data','butcher'));
     
        return $pdf->download('butcher_hst.pdf');
    }

    public function purchase_Excel($slug)
    {
        return Excel::download(new PurchasesExport, 'purchase.'.$slug);
    }

    public function purchase_PDF()
    {
        $data = Purchase::all();
           
        $pdf = PDF::loadView('purchase.exportPDF', compact('data'));
     
        return $pdf->download('purchase_export.pdf');
    }

    public function leather_sale_Excel($slug, $item) 
    {
        return Excel::download(new LeatherSaleExport($item), 'leather_sale.'.$slug);
    }

    public function leather_sale_PDF()
    {
        $data = Sale::select('id','item','customer','grade','kilos','sheet','price','total_price','created_at')->where('item','=','Leather')->get();
           
        $pdf = PDF::loadView('sale.leather_sale_PDF', compact('data'));
     
        return $pdf->download('leather_sale.pdf');
    }

    public function meat_sale_Excel($slug, $item) 
    {
        return Excel::download(new MeatSaleExport($item), 'meat_sale.'.$slug);
    }

    public function meat_sale_PDF()
    {
        $data = Sale::select('id','item','customer','grade','kilos','sheet','price','total_price','created_at')->where('item','=','meat')->get();
           
        $pdf = PDF::loadView('sale.meat_sale_PDF', compact('data'));
     
        return $pdf->download('meat_sale.pdf');
    }
}
