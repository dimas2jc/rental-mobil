<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChargeRent;
use App\Models\Booking;
use DB;
use Yajra\DataTables\DataTables;

class PembayaranController extends Controller
{
    public function get_charge(){
        $data = ChargeRent::all();
            return Datatables::of($data)
                ->make(true);
    }

    public function get_booking(){
        $data = DB::table('booking as b')
                ->leftJoin('customer as c', 'c.id_customer', 'b.id_customer')
                ->leftJoin('vehicles as v', 'v.id_vehicles', 'b.id_vehicles')
                ->leftJoin('detail_payment as dp', 'dp.id_booking', 'b.id_booking')
                ->leftJoin(DB::raw('
                    (
                        select id_booking, sum(price) as price from detail_payment as d group by id_booking
                    ) AS d
                '), function($join) {
                    $join->on('d.id_booking', '=', 'b.id_booking');
                })
                ->select('b.id_booking as id', 'v.nopol as nopol', 'c.name_customer as name', 'b.date_start as date_start', 
                        'b.date_finish as date_finish', 'd.price as price', 'b.price_sales as price_sales', 'b.dp_sales as dp_sales')
                ->groupBy('id', 'nopol', 'name', 'date_start', 'date_finish', 'price', 'price_sales', 'dp_sales')
                ->get();
            return Datatables::of($data)
                ->make(true);
    }
}
