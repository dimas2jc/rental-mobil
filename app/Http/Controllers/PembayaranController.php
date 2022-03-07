<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChargeRent;

class PembayaranController extends Controller
{
    public function index(){
        return view('pembayaran');
    }

    public function pos(){
        return view('pos');
    }

    public function get_charge(){
        $data = ChargeRent::all();

        return response()->json($data, 200);
    }

}
