<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\Storage;

class SaleController extends Controller
{
    public function leather_sale()
    {
        $data = Sale::select('id', 'item', 'customer', 'grade', 'kilos', 'sheet', 'price', 'total_price')->where('item', '=', 'Leather')->get();
        return view('sale.leather_sale', compact('data'));
    }

    public function meat_sale()
    {
        $data = Sale::select('id', 'item', 'customer', 'grade', 'kilos', 'price', 'total_price')->where('item', '=', 'Meat')->get();
        return view('sale.meat_sale', compact('data'));
    }

    public function create()
    {
        return view('sale.create');
    }

    public function leather_sale_post(Request $request)
    {
        if (!isset($request->item)) {
            toast('Item field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->sale_grade)) {
            toast('Grade field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->customer)) {
            toast('Customer field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->kilos)) {
            toast('Kilos field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'item' => 'required',
                'sale_grade' => 'required',
                'customer' => 'required',
                'kilos' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0',
            ];

            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data Invalid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                if ($request->item == "Leather") {
                    $cek = $request->sale_grade;
                    $sheet = Storage::select('id', 'grade', 'sheet')->where('grade', $cek)->first();
                    $sheet_avail = $sheet['sheet'];
                    $kilos = Storage::select('id', 'grade', 'kilos')->where('grade', $cek)->first();
                    $kilos_avail = $kilos['kilos'];

                    if ($request->sheet > $sheet_avail) {
                        toast('Input Data Exceeded!', 'error', 'top-right');
                        return back()->withInput();
                    } elseif ($request->kilos > $kilos_avail) {
                        toast('Input Data Exceeded!', 'error', 'top-right');
                        return back()->withInput();
                    } else {
                        Sale::create([
                            'item' => $request->item,
                            'customer' => $request->customer,
                            'grade' => $request->sale_grade,
                            'kilos' => $request->kilos,
                            'sheet' => $request->sheet,
                            'price' => $request->price,
                            'total_price' => $request->total_price,
                        ]);

                        Storage::select('grade', 'sheet')->where('grade', $request->sale_grade)->update([
                            'sheet' => intval($sheet_avail) - intval($request->sheet),
                            'kilos' => intval($kilos_avail) - intval($request->kilos)
                        ]);
                        Alert::success('Success', 'Data Created Successfully!');
                        return redirect('/leather_sale');
                    }
                }

                if ($request->item == "Meat") {
                    Sale::create([
                        'item' => $request->item,
                        'customer' => $request->customer,
                        'grade' => $request->sale_grade,
                        'kilos' => $request->kilos,
                        'price' => $request->price,
                        'total_price' => $request->total_price,
                    ]);
                    Alert::success('Success', 'Data Created Successfully!');
                    return redirect('/leather_sale');
                }
            }
        }
    }
}
