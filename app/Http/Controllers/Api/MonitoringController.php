<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\DetailPayment;
use Yajra\DataTables\DataTables;
use DB;

class MonitoringController extends Controller
{
    public function monitoring_datatable(){
        // $data = DB::table('booking as b')
        // ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
        // ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
        // ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
        // ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        // ->leftJoin(DB::raw('
        //     (
        //         select id_charge_vehicles, price_charge_vehicles as price_charge from charge_rent as cr where cr.id_charge_vehicles = 1 group by id_charge_vehicles, price_charge_vehicles
        //     ) AS o
        // '), function($join) {
        //     $join->on('o.id_charge_vehicles', '=', 'pr.id_charge_vehicles');
        // })
        // ->leftJoin(DB::raw('
        //     (
        //         select id_charge_vehicles, price_charge_vehicles as price_charge from charge_rent as cr where cr.id_charge_vehicles = 2 group by id_charge_vehicles, price_charge_vehicles
        //     ) AS lw
        // '), function($join) {
        //     $join->on('lw.id_charge_vehicles', '=', 'pr.id_charge_vehicles');
        // })
        // ->leftJoin(DB::raw('
        //     (
        //         select id_charge_vehicles, price_charge_vehicles as price_charge from charge_rent as cr where cr.id_charge_vehicles = 3 group by id_charge_vehicles, price_charge_vehicles
        //     ) AS bbm
        // '), function($join) {
        //     $join->on('bbm.id_charge_vehicles', '=', 'pr.id_charge_vehicles');
        // })
        // ->leftJoin(DB::raw('
        //     (
        //         select id_charge_vehicles, price_charge_vehicles as price_charge from charge_rent as cr where cr.id_charge_vehicles = 4 group by id_charge_vehicles, price_charge_vehicles
        //     ) AS cw
        // '), function($join) {
        //     $join->on('cw.id_charge_vehicles', '=', 'pr.id_charge_vehicles');
        // })
        // ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
        // ->leftJoin('price_vehicles as pv', 'pv.id_vehicles', '=', 'v.id_vehicles')
        // ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
        // ->select('b.id_booking', 'vv.vehicles_type as type_unit', 'b.date_start as date_start', 'b.date_finish as date_finish', 's.name_sales as name_sales',
        // 'c.name_customer as user', 'b.real_price as real_price', 'pr.total_payment as price_user', 'o.price_charge as o_charge', 'lw.price_charge as lw_charge',
        // 'bbm.price_charge as bbm_charge', 'cw.price_charge as cw_charge','b.dp_sales as dp_sales', 'dp.description as description')
        // ->groupBy('b.id_booking', 'type_unit', 'date_start', 'date_finish', 'name_sales', 'user', 'real_price', 'price_user', 'o_charge', 'lw_charge', 'bbm_charge', 
        // 'cw_charge','dp_sales', 'description')
        // ->where('b.status_booking', 4)
        // ->get();

        $data = DB::table('detail_payment')
        ->select('id_booking', 'id_payment_rent')
        ->groupBy('id_booking', 'id_payment_rent')
        ->get();
        $data2['id_payment_rent'] = DB::table('payment_rent as pr')
        ->join('charge_rent as cr', 'cr.id_charge_vehicles', '=', 'pr.id_charge_vehicles')
        ->get();
        dd($data);
        return Datatables::of($data)
            ->make(true);
    }
}
