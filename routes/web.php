<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ButcherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelCSVController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LeatherController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StorageController;
use App\Models\Butcher;
use App\Models\ButcherDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/post', [AuthController::class, 'login_post']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/butcher', [ButcherController::class, 'index']);
Route::get('/butcher/create', [ButcherController::class, 'create']);
Route::post('/butcher/post', [ButcherController::class, 'post']);
Route::get('/butcher/{id}/edit', [ButcherController::class, 'edit']);
Route::get('/butcher/{id}/detail', [ButcherController::class, 'detail']);
Route::post('/butcher/{id}/update', [ButcherController::class, 'update']);
Route::get('/butcher/{id}/delete', [ButcherController::class, 'delete']);


Route::get('/leather', [LeatherController::class, 'index']);
Route::post('/leather/post', [LeatherController::class, 'post']);


Route::get('/storage', [StorageController::class, 'storage']);

Route::get('/leather/create', function () {
    $butcher = Butcher::all();
    return view('leather.create',['butcher' => $butcher]);
});

Route::get('getButcher/{id}', function ($id) {
    $grade = ButcherDetail::join('grade','butcher_detail.grade_id','=','grade.id')->select('butcher_detail.id','butcher_detail.grade_id','butcher_detail.butcher_id','butcher_detail.price','grade.grade')->where('butcher_detail.butcher_id', $id)->get();
    return response()->json($grade);
});

Route::get('/get/details/{id}', [LeatherController::class, 'getButcherDetails'])->name('getButcherDetails');

Route::get('/leather_sale', [SaleController::class, 'leather_sale']);
Route::get('/meat_sale', [SaleController::class, 'meat_sale']);
Route::get('/sale/create', [SaleController::class, 'create']);

Route::get('getItem/{id}', function ($id) {
    if($id == 'Leather'){
        $data = ['Baik','Lokal','Afkir','Jantan','Kulit Kepala'];
    }elseif($id == 'Meat'){
        $data = ['Merah','Putih'];
    }
    return response()->json($data);
});

Route::post('/leather_sale/post', [SaleController::class, 'leather_sale_post']);

Route::get('export-excel-csv-file/{slug}/{id}', [ExcelCSVController::class, 'exportExcelCSV']);
Route::get('export-pdf/{id}', [ExcelCSVController::class, 'exportPDF']);

Route::get('purchase-excel-csv-file/{slug}', [ExcelCSVController::class, 'purchase_Excel']);
Route::get('purchase-pdf', [ExcelCSVController::class, 'purchase_PDF']);

Route::get('leather-sale-excel-csv-file/{slug}/{item}', [ExcelCSVController::class, 'leather_sale_Excel']);
Route::get('leather-sale-pdf', [ExcelCSVController::class, 'leather_sale_PDF']);

Route::get('meat-sale-excel-csv-file/{slug}/{item}', [ExcelCSVController::class, 'meat_sale_Excel']);
Route::get('meat-sale-pdf', [ExcelCSVController::class, 'meat_sale_PDF']);

Route::get('/purchase', [FinanceController::class, 'purchase']);
Route::get('/purchase/create', [FinanceController::class, 'purchase_create']);
Route::post('/purchase/post', [FinanceController::class, 'purchase_post']);