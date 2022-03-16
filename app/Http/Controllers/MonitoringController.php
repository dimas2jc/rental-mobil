<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DetailPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonitoringController extends Controller
{
    public function index_keuangan(){
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

    public function get_board_monitoring()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();

        $date = [];
        for($i = 0; $i < 7; $i++){
            if($i != 0){
                $date[$i] = date("d-m-Y", strtotime($startOfWeek.'+'.$i.' days'));
            }
            else{
                $date[$i] = date("d-m-Y", strtotime($startOfWeek));
            }
        }

        // $payment = DetailPayment::leftJoin('payment_rent as pr', 'pr.id_payment_rent', 'detail_payment.id_payment_rent')
        // ->select('detail_payment.id_booking', DB::raw("detail_payment.price AS dp"))
        // ->where('detail_payment.description', 'like', '%DP%')->first();

        $dp = DB::raw("(
            SELECT detail_payment.id_booking, detail_payment.price AS dp
            FROM detail_payment
            WHERE detail_payment.description like '%DP%'
            ) AS detail_payment");

        $lunas = DB::raw("(
            SELECT detail_payment.id_booking, detail_payment.price AS pelunasan
            FROM detail_payment
            WHERE detail_payment.description like '%Pelunasan%'
            ) AS pelunasan");

        $booking = Booking::where('booking.date_start','>=', $startOfWeek)
        ->where('booking.date_finish','<=', $endOfWeek)
        ->orWhere(function ($query) use ($endOfWeek) {
            $query->where('booking.date_finish', '>',  $endOfWeek);
        })
        // ->leftJoin('booking', 'booking.id_booking', 'detail_payment.id_booking')
        ->leftJoin('sales', 'sales.id_sales', 'booking.id_sales')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', 'vehicles.id_varian_vehicles')
        ->leftJoin('customer', 'customer.id_customer', 'booking.id_customer')
        // ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', 'detail_payment.id_payment_rent')
        ->leftJoin($dp, 'detail_payment.id_booking', 'booking.id_booking')
        ->leftJoin($lunas, 'pelunasan.id_booking', 'booking.id_booking')
        ->groupBy('booking.id_booking')
        ->orderBy('booking.id_vehicles', 'ASC')
        // ->orderBy('detail_payment.timestamps', 'ASC')
        ->select(
            'booking.*',
            'customer.name_customer',
            'sales.name_sales',
            // DB::raw("(
            //     CASE
            //         WHEN detail_payment.description like 'DP' THEN detail_payment.price
            //         ELSE null
            //     END
            // ) AS detail_payment"),
            // DB::raw("(
            //     CASE
            //         WHEN SUM(detail_payment.price) = pr.total_payment THEN detail_payment.price
            //         ELSE null
            //     END
            // ) AS pelunasan"),
            DB::raw("CONCAT(vv.nama_varian,' ',vehicles.nopol) AS vehicle_name"),
            // 'pelunasan.pelunasan',
            // 'detail_payment.dp'
        )->get();

        $data = [];
        $index = 0;
        $no = 0;
        foreach ($booking as $key => $value) {
            if($key > 0){
                if($booking[$key]->id_vehicles == $booking[$key - 1]->id_vehicles){
                    $no = 0;
                    $data[$index]['vehicle'] = $booking[$key]->vehicle_name;
                    $data[$index]['detail'][$no] = $booking[$key];
                    $no += 1;
                }
                else{
                    $data[$index]['detail'][$no] = $booking[$key];
                    $no += 1;
                }
            }
            else{
                $data[$index]['vehicle'] = $booking[$key]->vehicle_name;
                $data[$index]['detail'][$no] = $booking[$key];
                $no += 1;
            }
        }

        // dd($data);

        // return response()->json($data, 200);
        return view('board_monitoring', compact('data','date'));
    }
}
