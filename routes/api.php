<?php

use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\PemilikKendaraanController;
use App\Http\Controllers\Api\HargaKendaraanController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\MonitoringController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pegawai_datatable', [PegawaiController::class, 'pegawai_datatable']);

Route::get('customer_datatable', [CustomerController::class, 'customer_datatable']);
Route::get('customer_b_datatable', [CustomerController::class, 'customer_b_datatable']);

Route::get('sales_datatable', [SalesController::class, 'sales_datatable']);

Route::get('pemilik_kendaraan_datatable', [PemilikKendaraanController::class, 'pemilik_kendaraan_datatable']);

Route::get('harga_kendaraan_datatable', [HargaKendaraanController::class, 'harga_kendaraan_datatable']);

Route::get('kendaraan_datatable', [KendaraanController::class, 'kendaraan_datatable']);

Route::get('body_datatable', [KendaraanController::class, 'body_kendaraan_datatable']);

Route::get('varian_datatable', [KendaraanController::class, 'varian_kendaraan_datatable']);

Route::get('dokumen_datatable', [KendaraanController::class, 'dokumen_kendaraan_datatable']);

Route::get('monitoring_datatable', [MonitoringController::class, 'monitoring_datatable']);

Route::get('laporan_datatable', [LaporanController::class, 'laporan_datatable']);

Route::get('get_charge', [PembayaranController::class, 'get_charge']);

Route::get('get_booking', [PembayaranController::class, 'get_booking']);
Route::get('service_datatable', [ServiceController::class, 'service_datatable']);
