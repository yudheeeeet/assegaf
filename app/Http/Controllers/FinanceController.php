<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Validator;
use Alert;

class FinanceController extends Controller
{
    public function purchase()
    {
        $data = Purchase::all();
        return view('purchase.index', compact('data'));
    }

    public function purchase_create()
    {
        return view('purchase.create');
    }

    public function purchase_post(Request $request)
    {
        if (!isset($request->detail)) {
            toast('Detail field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->amount)) {
            toast('Amount field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->price)) {
            toast('Price field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'detail' => 'required|string|min:3',
                'amount' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0',
                'total_purchase' => 'required|numeric|min:0',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data Invalid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                Purchase::create([
                    'detail' => $request->detail,
                    'amount' => $request->amount,
                    'price' => $request->price,
                    'total_purchase' => $request->total_purchase
                ]);

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/purchase');
            }
        }
    }
}
