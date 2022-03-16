<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\DetailPayment;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use DB;

class MonitoringController extends Controller
{
    public function monitoring_datatable(){
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();

        $data = DB::table('booking as b')
        ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
        ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
        ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        ->join('detail_charge as dc', 'dc.id_payment_rent', 'pr.id_payment_rent')
        ->leftJoin('charge_rent as cr', 'cr.id_charge_vehicles', 'dc.id_charge_vehicles')
        ->leftJoin('vehicles as v', 'b.id_vehicles', 'v.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', 'v.id_varian_vehicles')
        ->groupBy('b.id_booking')
        ->where('b.status_booking', 2)
        ->whereBetween('pr.date_payment', [$startOfWeek, $endOfWeek])
        ->selct(
            'b.*',
            'c.name_customer',
            's.name_sales',
            DB::raw("SUM(cr.price_charge_vehicles) AS total_charge"),
            DB::raw("SUM(dp.price) AS payment"),
            'dp.bukti',
            'pr.date_payment as date'
        )
        ->get();

        return Datatables::of($data)
            ->make(true);
    }

    public function list_booking_datatable()
    {
        $data = DB::table('booking')
        ->leftJoin('customer', 'customer.id_customer', 'booking.id_customer')
        ->leftJoin('sales', 'sales.id_sales', 'booking.id_sales')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->select(
            'booking.*',
            'customer.name_customer',
            'sales.name_sales',
            'vehicles.nopol as kendaraan'
        )
        ->get();
        return Datatables::of($data)
            ->make(true);
    }
}
