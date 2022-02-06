<?php

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

Route::get('/', function () {
    return view('booking');
});
Route::get('/data_master', function () {
    return view('data_master_user');
});
Route::get('/data_master/users', function () {
    return view('data_master_user');
});
