<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Ramsey\Uuid\Uuid;

class BookingController extends Controller
{
    public function store_booking(Request $request)
    {
        $request->validate([
            'vehicle' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'harga' => 'required',
            'dp' => 'required'
        ]);

        if($request->sudah_ada == 1){
            $id_customer = $request->customer;
        }
        else{
            $id_customer = Uuid::uuid4();
            Customer::insert([
                'id_customer' => $id_customer,
                'no_kk_customer' => $request->no_kk,
                'name_customer' => $request->name,
                'address_customer' => $request->alamat,
                'phone_customer' => $request->no_telp,
                'email_customer' => $request->email
            ]);
        }

        Booking::insert([
            'id_booking' => Uuid::uuid4(),
            'id_customer' => $id_customer,
            'id_vehicles' => $request->vehicle,
            // 'id_sales' =>
            'date_start' => date("Y-m-d", strtotime($request->start_date)),
            'date_finish' => date("Y-m-d", strtotime($request->end_date)),
            'price_sales' => $request->harga,
            'dp_sales' => $request->dp,
            'status_booking' => 1, // init (belum di approve)
            'komisi_sales' => $request->harga - $request->real_price,
            'real_price' => $request->real_price
        ]);

        return back();
    }

    public function get_booking()
    {
        $data = Booking::leftJoin('customer', 'customer.id_customer', 'booking.id_customer')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->get();

        return response()->json($data, 200);
    }

    public function get_kendaraan(Request $request)
    {
        $start_date = date("Y-m-d H:i:s", strtotime($request->start));
        $end_date = date("Y-m-d H:i:s", strtotime($request->end));

        $data = Vehicle::join('booking', 'booking.id_vehicles', 'vehicles.id_vehicles')
        ->whereRaw("
            ('".$start_date."' > booking.date_finish OR '".$end_date."' < booking.date_start) AND booking.status_booking != 0
        ")
        ->select('vehicles.id_vehicles', 'vehicles.nopol')
        ->get();

        return response()->json($data, 200);
    }

    public function get_harga(Request $request)
    {
        $start_date = new Date(strtotime($request->date_start));
        $end_date = new Date(strtotime($request->date_end));
        $jam = $start_date->diff($end_date);

        dd($jam);
    }
}
