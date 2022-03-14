<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChargeRent;
use DB;

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

    
    public function insert(Request $request){
        $id_payment = DB::table('detail_payment')
                    ->where('id_booking', $request->idBooking)
                    ->where('description', 'like', '%DP%')
                    ->first();

        $sum_price = DB::table('detail_payment')
                    ->where('id_booking', $request->idBooking)
                    ->sum('price');

        $sum_charge = DB::table('charge_rent')->whereIn('id_charge_vehicles', $request->id_charge)->sum('price_charge_vehicles');

        $price = DB::table('booking')->select('price_sales')->where('id_booking', $request->idBooking)->max('price_sales');
        // dd($sum_charge);
        $total_price = $sum_price + $request->inputTotal + $request->inputDiskon - $sum_charge;

        foreach ($request->id_charge as $key => $value) {
            // dd($value[$key]);
            DB::table('detail_charge')->insert([
                'id_payment_rent' => $id_payment->id_payment_rent,
                'id_charge_vehicles' => $value
            ]);
        }

        if($total_price == $price){
            DB::table('detail_payment')->insert([
                'id_booking' => $request->idBooking,
                'id_payment_rent' => $id_payment->id_payment_rent,
                'price' => $request->inputSubtotal,
                'description' => 'Lunas'
            ]);

            DB::table('payment_rent')->where('id_payment_rent', $id_payment->id_payment_rent)->update([
                'diskon' => $request->inputDiskon,
                'status_payment' => 1
            ]);

        }else{
            DB::table('detail_payment')->insert([
                'id_booking' => $request->idBooking,
                'id_payment_rent' => $id_payment->id_payment_rent,
                'price' => $request->inputSubtotal,
                'description' => 'Belum Lunas'
            ]);

            DB::table('payment_rent')->where('id_payment_rent', $id_payment->id_payment_rent)->update([
                'diskon' => $request->inputDiskon,
                'status_payment' => 0
            ]);
        }

        return back();

        // foreach ($request['id_charge'] as $key) {

            // dd($request['price_charge'][$key]);
            
        // }
    }

}
