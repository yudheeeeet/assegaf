<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use App\Models\ButcherDetail;
use App\Models\Grade;
use App\Models\Leather;
use App\Models\Storage;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\Purchase;

class LeatherController extends Controller
{
    public function index()
    {
        $data = Leather::join('butcher','leather.butcher_id','=','butcher.id')->select('leather.kilos','leather.id','leather.total_price','butcher.name')->get();

        return view('leather.index', compact('data'));
    }

    public function create()
    {
        $butcher = Butcher::all();
        return view ('leather.create', compact('butcher'));
    }

    public function getButcherDetails($id = 0)
    {
        $butcher = ButcherDetail::find($id);
        $data = [
            'price' => $butcher->price,
        ];

        return response()->json($data);
    }

    public function post(Request $request)
    {
        if (!isset($request->butcher_id)) {
            toast('Butcher field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->kilos)) {
            toast('Kilos field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif (!isset($request->sheet)) {
            toast('Sheet field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'butcher_id' => 'required',
                'sheet' => 'required|numeric|min:0',
                'kilos' => 'required|numeric|min:0'
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data invalid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                $butcher = ButcherDetail::select('id','butcher_id' ,'price')->where('butcher_id', $request->butcher_id)->first();
                $butcher_price = $butcher['price'];

                Leather::create([
                    'butcher_id' => $request->butcher_id,
                    'kilos' => $request->kilos,
                    'sheet' => $request->kilos,
                    'total_price' => intval($request->kilos) * intval($butcher_price)
                ]);

                $grade = Grade::select('id','grade')->where('id',$request->grade)->first();
                $grade_pass = $grade['grade'];

                $storage = Storage::select('id','grade','kilos')->where('grade',$grade_pass)->first();
                $storage_awal = $storage['kilos'];

                $storage->update([
                    'sheet' => $request->sheet,
                    'kilos' => intval($storage_awal) + intval($request->kilos)
                ]);

                Purchase::create([
                    'detail' => 'Skin Purchase',
                    'amount' => $request->kilos,
                    'price' => $butcher_price,
                    'total_purchase' => intval($request->kilos) * intval($butcher_price),
                ]);

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/leather');
            }
        }
    }
}
