<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MonitoringController extends Controller
{
    public function index(){
        $data = DB::table('booking as b')
                ->join('sales as s', 's.id_sales', '=', 'b.id_sales')
                ->join('customer as c', 'c.id_customer', '=', 'b.id_customer')
                ->join('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
                ->join('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
                ->join('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
                ->join('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
                ->select('b.id_booking', 'vv.vehicles_type', 'b.date_start', 'b.date_finish', 's.name_sales',
                'c.name_customer', 'pr.total_payment', 'b.dp_sales', 'dp.description')
                ->groupBy('b.id_booking', 'vv.vehicles_type', 'b.date_start', 'b.date_finish', 's.name_sales',
                'c.name_customer', 'pr.total_payment', 'b.dp_sales', 'dp.description')
                // ->groupBy('b.id_booking', 'type_unit', 'date_start', 'date_finish', 'name_sales', 'user', 'real_price', 'price_user', 'o_charge', 'lw_charge', 'dp_sales', 'description')
                ->where('b.status_booking', 4)
                ->get();
        $data2 = DB::table('detail_payment as dp')
                ->join('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
                ->join('charge_rent as cr', 'cr.id_charge_vehicles', '=', 'pr.id_charge_vehicles')
                ->select('dp.id_booking', 'pr.id_charge_vehicles', 'cr.price_charge_vehicles', 'pr.total_payment')
                // ->groupBy('dp.id_booking', 'pr.id_charge_vehicles', 'cr.price_charge_vehicles', 'pr.total_payment')
                // ->where('dp.id_booking', 2)
                ->get();
        // dd($data2);
        return view('/monitoring', compact('data', 'data2'));
    }

    // public function get_monitoring(){
    //     $data = DB::table('booking as b')
    //     ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
    //     ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
    //     ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
    //     ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
    //     ->leftJoin(DB::raw('
    //         (
    //             select id_booking, id_charge_vehicles, price_charge_vehicles from detail_payment leftjoin payment_rent leftjoin charge_rent as cr where id_charge_vehicles = 1 group by id_booking
    //         ) AS o
    //     '), function($join) {
    //         $join->on('o.id_booking', '=', 'pr.id_booking');
    //     })
    //     ->leftJoin(DB::raw('
    //         (
    //             select id_booking, id_charge_vehicles, price_charge_vehicles from detail_payment as cr leftjoin payment_rent leftjoin charge_rent where id_charge_vehicles = 2 group by id_booking
    //         ) AS lw
    //     '), function($join) {
    //         $join->on('lw.id_booking', '=', 'pr.id_booking');
    //     })
    //     ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
    //     ->leftJoin('price_vehicles as pv', 'pv.id_vehicles', '=', 'v.id_vehicles')
    //     ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
    //     ->select('b.id_booking', 'vv.vehicles_type as type_unit', 'b.date_start as date_start', 'b.date_finish as date_finish', 's.name_sales as name_sales',
    //     'c.name_customer as user', 'b.real_price as real_price', 'pr.total_payment as price_user', 'o.price_charge_vehicles as o_charge', 'lw.price_charge_vehicles as lw_charge',
    //      'b.dp_sales as dp_sales', 
    //     'dp.description as description')
    //     ->groupBy('b.id_booking', 'type_unit', 'date_start', 'date_finish', 'name_sales', 'user', 'real_price', 'price_user', 'o_charge', 'lw_charge', 'dp_sales', 'description')
    //     ->where('b.status_booking', 4)
    //     ->get();
    //     dd($data);
    //     return response()->json($data, 200);

    // }
}
