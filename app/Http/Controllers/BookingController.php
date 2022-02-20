<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
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
                'ID_CUSTOMER' => $id_customer,
                'NO_KK_CUSTOMER' => $request->no_kk,
                'NAME_CUSTOMER' => $request->name,
                'ADDRESS_CUSTOMER' => $request->alamat,
                'PHONE_CUSTOMER' => $request->no_telp,
                'EMAIL_CUSTOMER' => $request->email
            ]);
        }

        Booking::insert([
            'ID_BOOKING' => Uuid::uuid4(),
            'ID_CUSTOMER' => $id_customer,
            'ID_VEHICLES' => $request->vehicle,
            // 'ID_SALES' =>
            'DATE_START' => date("Y-m-d", strtotime($request->start_date)),
            'DATE_FINISH' => date("Y-m-d", strtotime($request->end_date)),
            'PRICE_SALES' => $request->harga,
            'DP_SALES' => $request->dp,
            'STATUS_BOOKING' => 0
        ]);

        return back();
    }

    public function get_booking()
    {
        $data = Booking::leftJoin('customer', 'customer.ID_CUSTOMER', 'booking.ID_CUSTOMER')
        ->leftJoin('vehicles', 'vehicles.ID_VEHICLES', 'booking.ID_VEHICLES')
        ->get();

        return response()->json($data, 200);
    }
}
