<?php

namespace App\Http\Controllers;

use App\Models\Butcher;
use Illuminate\Http\Request;
use Validator;
use Alert;
use App\Models\ButcherDetail;
use App\Models\Leather;

class ButcherController extends Controller
{
    public function index()
    {
        $data = Butcher::all();
        return view('butcher.index', compact('data'));
    }

    public function create()
    {
        return view('butcher.create');
    }

    public function post(Request $request)
    {
        if (!isset($request->name)) {
            toast('Name field required!', 'error', 'top-right');
            return back()->withInput();
        } elseif(!isset($request->detail)) {
            toast('Price & Grade field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'name' => 'required|string|min:3',
                'request.*.price' => 'required',
                'request.*.skin_grade' => 'required',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                Butcher::create([
                    'name' => $request->name
                ]);

                foreach($request->detail as $key => $value){
                    ButcherDetail::create($value);
                }

                Alert::success('Success', 'Data Created Successfully!');
                return redirect('/butcher');
            }
        }
    }

    public function edit($id)
    {
        $data = Butcher::all()->where('id', $id)->first();
        $grade = ButcherDetail::select('butcher_id','grade_id','price')->where('butcher_id', $id)->get();
        return view('butcher.edit', compact('data','grade'));
    }

    public function update(Request $request, $id)
    {
        if (!isset($request->name)) {
            toast('Name field required!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validasi = [
                'name' => 'required|string|min:3',
                'request.*.price' => 'required',
                'request.*.skin_grade' => 'required',
            ];
            $validation = Validator::make($input, $validasi);
            if ($validation->fails()) {
                toast('Data not valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                Butcher::where('id', $id)->update([
                    'name' => $request->name,
                ]);

                foreach($request->detail as $key => $value){
                    ButcherDetail::create($value);
                }

                Alert::success('Success', 'Data Updated Successfully!');
                return redirect('/butcher');
            }
        }
    }

    public function delete($id)
    {
        $leather = Leather::select('id','butcher_id','kilos','total_price')->where('butcher_id',$id)->get();
        $leather->each->delete();
        
        $butcher_detail = ButcherDetail::select('id','butcher_id','grade_id','price')->where('butcher_id', $id)->get();
        $butcher_detail->each->delete();

        $data = Butcher::findOrfail($id);
        $data->delete();

        Alert::success('Success', 'Data Deleted Successfully!');
        return redirect('/butcher');
    }

    public function detail($id)
    {
        $data = Butcher::findOrfail($id);
        $grade = ButcherDetail::join('grade','butcher_detail.grade_id','=','grade.id')->select('butcher_detail.butcher_id','butcher_detail.grade_id','butcher_detail.price','grade.grade')->where('butcher_id',$id)->get();
        $history = Leather::where('butcher_id', $id)->get();

        return view ('butcher.detail', compact('data', 'grade','history'));
    }
}
