<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PemilikKendaraanController;
use App\Http\Controllers\HargaKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\HomeController;

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

Route::get('/login', [HomeController::class, 'authenticate'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/post-login', [HomeController::class, 'postLogin']);

Route::group(['middleware' => ['auth']],function(){
    Route::get('/', function () {
        $data['customer'] = DB::table('customer')->select('id_customer', 'name_customer')->get();
        // $data['vehicle'] = DB::table('vehicles')->select('id_vehicles', 'nopol')->get();
        return view('booking', compact('data'));
    })->name('pegawai');
    Route::get('/data_master', function () {
        return view('data_master_pegawai');
    });
    Route::get('/data_master/settings', function () {
        $data['company'] = DB::table('company')->first();
        return view('data_master_setting', compact('data'));
    });
    Route::get('/data_master/users', function () {
        return view('data_master_user');
    });
    Route::get('/data_master/employes', function () {
        return view('data_master_pegawai');
    });
    Route::get('/data_master/pemilik-kendaraan', function () {
        return view('data_master_pemilik_kendaraan');
    });
    Route::get('/data_master/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/data_master/harga-kendaraan', function () {
        $data = DB::table('vehicles')->select('ID_VEHICLES', 'NOPOL')->get();
        return view('data_master_harga_kendaraan', compact('data'));
    });

    Route::get('monitoring', [MonitoringController::class, 'index']);

    Route::get('get_booking', [BookingController::class, 'get_booking']);
    Route::get('reschedule_booking/{id}', [BookingController::class, 'get_reschedule_booking']);
    Route::get('approve/{id}', [BookingController::class, 'approve']);
    Route::post('get_kendaraan', [BookingController::class, 'get_kendaraan']);
    Route::post('get_harga', [BookingController::class, 'get_harga']);
    Route::post('store_booking', [BookingController::class, 'store_booking']);
    Route::post('update_booking', [BookingController::class, 'update_booking']);

    Route::post('setting/company', [CompanyController::class, 'setting1']);
    Route::post('setting/company/{id}', [CompanyController::class, 'setting2']);
    Route::get('data_master/get_data_master', [PegawaiController::class, 'data_master']);

    Route::get('data_master/get_pegawai/{id}', [PegawaiController::class, 'get_pegawai']);
    Route::post('data_master/pegawai/{id}', [PegawaiController::class, 'update']);
    Route::put('data_master/edit_status_pegawai/{id}', [PegawaiController::class, 'edit_status_pegawai']);
    Route::resource('data_master/pegawai', PegawaiController::class);

    Route::get('data_master/get_sales/{id}', [SalesController::class, 'get_sales']);
    Route::post('data_master/sales/{id}', [SalesController::class, 'update']);
    Route::put('data_master/edit_status_sales/{id}', [SalesController::class, 'edit_status_sales']);
    Route::resource('data_master/sales', SalesController::class);

    Route::get('data_master/get_pemilik_kendaraan/{id}', [PemilikKendaraanController::class, 'get_pemilik_kendaraan']);
    Route::get('data_master/get_pemilik_kendaraan', [PemilikKendaraanController::class, 'get_all_pemilik_kendaraan']);
    Route::post('data_master/pemilik_kendaraan/{id}', [PemilikKendaraanController::class, 'update']);
    Route::resource('data_master/pemilik_kendaraan', PemilikKendaraanController::class);

    Route::get('data_master/get_harga_kendaraan/{id}', [HargaKendaraanController::class, 'get_harga_kendaraan']);
    Route::post('data_master/harga_kendaraan/{id}', [HargaKendaraanController::class, 'update']);
    Route::resource('data_master/harga_kendaraan', HargaKendaraanController::class);

    Route::get('data_master/get_kendaraan/{id}', [KendaraanController::class, 'get_kendaraan']);
    Route::post('data_master/kendaraan/{id}', [KendaraanController::class, 'update_kendaraan']);
    Route::post('data_master/kendaraan', [KendaraanController::class, 'store_kendaraan']);

    Route::get('data_master/get_body_kendaraan/{id}', [KendaraanController::class, 'get_body_kendaraan']);
    Route::get('data_master/get_body_kendaraan', [KendaraanController::class, 'get_all_body_kendaraan']);
    Route::post('data_master/body_kendaraan/{id}', [KendaraanController::class, 'update_body_kendaraan']);
    Route::post('data_master/body_kendaraan', [KendaraanController::class, 'store_body_kendaraan']);

    Route::get('data_master/get_varian_kendaraan/{id}', [KendaraanController::class, 'get_varian_kendaraan']);
    Route::get('data_master/get_varian_kendaraan', [KendaraanController::class, 'get_all_varian_kendaraan']);
    Route::post('data_master/varian_kendaraan/{id}', [KendaraanController::class, 'update_varian_kendaraan']);
    Route::post('data_master/varian_kendaraan', [KendaraanController::class, 'store_varian_kendaraan']);

    Route::get('data_master/get_dokumen_kendaraan/{id}', [KendaraanController::class, 'get_dokumen_kendaraan']);
    Route::get('data_master/get_dokumen_kendaraan', [KendaraanController::class, 'get_all_dokumen_kendaraan']);
    Route::post('data_master/dokumen_kendaraan/{id}', [KendaraanController::class, 'update_dokumen_kendaraan']);
    Route::post('data_master/dokumen_kendaraan', [KendaraanController::class, 'store_dokumen_kendaraan']);
});

require dirname(__FILE__).'/api.php';
