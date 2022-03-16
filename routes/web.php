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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\KetentuanController;
use App\Http\Controllers\ServiceController;

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
Route::post('/forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('/change-password-user/{id}', [HomeController::class, 'changeForgotPassword']);
Route::post('/post-forgot-password', [HomeController::class, 'storeForgotPassword']);

Route::group(['middleware' => ['auth']],function(){
    Route::get('/change-password', function () {
        return view('change_password');
    });
    Route::post('/post-change-password', [HomeController::class, 'change_password']);
    Route::get('/', function () {
        $data['customer'] = DB::table('customer')->select('id_customer', 'no_nik_customer')->get();
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
    Route::get('/data_master/customer', function () {
        $data['sales'] = DB::table('sales')->select('id_sales', 'name_sales')->get();
        return view('data_master_customer', compact('data'));
    });
    Route::get('/data_master/pemilik-kendaraan', function () {
        return view('data_master_pemilik_kendaraan');
    });
    Route::get('/data_master/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/data_master/body', function () {
        return view('data_master_body');
    });
    Route::get('/data_master/services', function () {
        return view('data_master_service');
    });
    Route::get('/data_master/harga-kendaraan', function () {
        $data = DB::table('vehicles')->select('ID_VEHICLES', 'NOPOL')->get();
        return view('data_master_harga_kendaraan', compact('data'));
    });
    Route::get('/list_booking', function(){
        return view('list_booking');
    });
    Route::get('/data_master/ketentuan', function(){
        return view('ketentuan');
    });
    // Route::get('/board_monitoring', function () {
    //     return view('board_monitoring');
    // });

    Route::get('board_monitoring', [MonitoringController::class, 'get_board_monitoring']);

    Route::get('keuangan', [MonitoringController::class, 'index_keuangan']);
    Route::get('get_monitoring', [MonitoringController::class, 'get_monitoring']);

    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('laporan/cetak/{id}', [LaporanController::class, 'cetak']);

    Route::get('pembayaran', [PembayaranController::class, 'index']);
    Route::post('pembayaran/insert', [PembayaranController::class, 'insert']);
    Route::get('pembayaran/pos', [PembayaranController::class, 'pos']);
    Route::get('get_booking', [BookingController::class, 'get_booking']);
    Route::get('get_all_service', [BookingController::class, 'get_all_service']);
    Route::get('reschedule_booking/{id}', [BookingController::class, 'get_reschedule_booking']);
    Route::get('approve/{id}', [BookingController::class, 'approve']);
    Route::get('/detail_booking/{id}', [BookingController::class, 'detail_booking']);
    Route::get('/closing', [BookingController::class, 'closing']);
    Route::post('/checklist/{id}', [BookingController::class, 'checklist']);
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

    Route::get('data_master/get_customer/{id}', [CustomerController::class, 'get_customer']);
    Route::post('data_master/customer/{id?}', [CustomerController::class, 'store']);
    Route::put('data_master/edit_status_customer/{id}', [CustomerController::class, 'edit_status_customer']);
    Route::put('data_master/unblacklist_customer/{id}', [CustomerController::class, 'unblacklist']);

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
    Route::get('data_master/get_all_kendaraan', [KendaraanController::class, 'get_all_kendaraan']);
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

    Route::post('data_master/charge', [ChargeController::class, 'store']);

    Route::get('monitoring_datatable', [MonitoringController::class, 'monitoring_datatable']);
    Route::put('data_master/service/{id}', [ServiceController::class, 'update_status']);
    Route::post('data_master/service', [ServiceController::class, 'store']);

    Route::get('monitoring_datatable', [MonitoringController::class, 'monitoring_datatable']);

    Route::get('ketentuan_datatable', [KetentuanController::class, 'datatable']);
    Route::post('ketentuan', [KetentuanController::class, 'store']);
    Route::get('ketentuan/{id}', [KetentuanController::class, 'destroy']);

    Route::get('/bukti/{id}', function($id){
        $data = DB::table('booking')->where('id_booking', $id)->first();
        $file = '/document/bukti/'.$data->bukti;
        return response()->file($file);
    });

    Route::get('print/checklist/{id}', [BookingController::class, 'print_checklist']);
});

require dirname(__FILE__).'/api.php';
