<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChargeRent;
use Yajra\DataTables\DataTables;

class PembayaranController extends Controller
{
    public function get_charge(){
        $data = ChargeRent::all();
            return Datatables::of($data)
                ->make(true);
    }
}
