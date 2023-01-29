<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function storage()
    {
        $baik = Storage::select('id','grade','sheet','kilos')->where('grade','=','Baik')->first();
        $lokal = Storage::select('id','grade','sheet','kilos')->where('grade','=','Lokal')->first();
        $afkir = Storage::select('id','grade','sheet','kilos')->where('grade','=','Afkir')->first();
        $jantan = Storage::select('id','grade','sheet','kilos')->where('grade','=','jantan')->first();
        return view('storage.index', compact('baik','lokal','afkir','jantan'));
    }
}
