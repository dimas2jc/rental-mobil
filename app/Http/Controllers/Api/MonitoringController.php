<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployesCompany;
use Yajra\DataTables\DataTables;

class MonitoringController extends Controller
{
    public function monitoring_datatable(){
        $data = Vehicle::from('booking as b')
        ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
        ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
        ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        ->leftJoin('charge_rent as cr', 'cr.id_cahrge_vehicles', '=', 'pr.id_payment_rent')
        ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
        ->leftJoin('price_vehicles as pv', 'pv.id_price_vehicles', '=', 'v.id_price_vehicles')
        ->select('')
        ->where('status_payment', 1)
        ->get();
        return Datatables::of($data)
            ->make(true);
    }
}
