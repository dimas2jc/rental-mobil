<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\DetailPayment;
use App\Models\PaymentRent;
use App\Models\PriceVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        DB::beginTransaction();
        $nopol = Vehicle::find($request->vehicle);

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

        $date_start = $request->start_date." ".$request->start_time;
        $date_end = $request->end_date." ".$request->end_time;

        $id_booking = Uuid::uuid4();
        $id_payment = Uuid::uuid4();
        Booking::insertGetId([
            'id_booking' => $id_booking,
            'id_customer' => $id_customer,
            'id_vehicles' => $request->vehicle,
            // 'id_sales' =>
            'date_start' => date("Y-m-d H:i:s", strtotime($date_start)),
            'date_finish' => date("Y-m-d H:i:s", strtotime($date_end)),
            'price_sales' => $request->harga,
            'dp_sales' => $request->dp,
            'status_booking' => 1, // init (belum di approve)
            'komisi_sales' => $request->harga - $request->real_price,
            'real_price' => $request->real_price
        ]);

        PaymentRent::insertGetId([
            'id_payment_rent' => $id_payment,
            'total_payment' => $request->harga,
            'date_payment' => Carbon::now(),
            'status_payment' => 0 // Belum Lunas
        ]);

        DetailPayment::insert([
            'id_booking' => $id_booking,
            'id_payment_rent' => $id_payment,
            'price' => $request->dp,
            'description' => "DP - ".$nopol->nopol." - Untuk tgl ".$date_start." sampai ".$date_end,
            'timestamps' => Carbon::now()
        ]);

        DB::commit();

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

        // $booking = Booking::
        // whereRaw("
        //     (('".$start_date."' <= date_start AND '".$end_date."' >= date_start)  OR
        //     ('".$start_date."' >= date_start AND '".$end_date."' <= date_finish) OR
        //     ('".$start_date."' >= date_start AND '".$end_date."' >= date_finish) OR
        //     ('".$start_date."' <= date_start AND '".$end_date."' >= date_finish)
        //     ) AND status_booking != 0
        // ")
        // ->select('id_vehicles')
        // ->get()->toArray();

        $booking = Booking::where('status_booking', '!=', 0)->get()->toArray();

        $id_vehicle = [];
        $index = 0;
        for($i = 0; $i < count($booking); $i++){
            if($start_date == $booking[$i]['date_start'] || $start_date > $booking[$i]['date_start']){
                if($start_date < $booking[$i]['date_finish'] || $start_date == $booking[$i]['date_finish']){
                    $id_vehicle[$index] = $booking[$i]['id_vehicles'];
                    $index += 1;
                }
            }
            else if($start_date < $booking[$i]['date_start']){
                if($booking[$i]['date_start'] == $end_date){
                    $id_vehicle[$index] = $booking[$i]['id_vehicles'];
                    $index += 1;
                }
                else if($booking[$i]['date_start'] < $end_date){
                    $id_vehicle[$index] = $booking[$i]['id_vehicles'];
                    $index += 1;
                }
            }
        }
        // dd($id_vehicle);

        $data = Vehicle::whereNotIn('id_vehicles', $id_vehicle)->get();

        return response()->json($data, 200);
    }

    public function get_harga(Request $request)
    {
        $start_date = strtotime($request->date_start);
        $end_date = strtotime($request->date_end);
        // $jam = date_diff(date_create($start_date), date_create($end_date));
        $jam = abs($end_date - $start_date)/(60*60);

        $harga = PriceVehicle::where(['id_vehicles' => $request->id_vehicles, 'time_rent' => 24])->first();
        $data = ($jam / $harga->time_rent) * $harga->price_vehicles;
        // dd($jam);

        return response()->json($data, 200);
    }

    public function get_reschedule_booking($id)
    {
        $data = Booking::where('id_booking', $id)
        ->select(
            '*',
            DB::raw("DATE_FORMAT(date_start, '%d/%m/%Y') AS start_date"),
            DB::raw("DATE_FORMAT(date_end, '%d/%m/%Y') AS end_date"),
            DB::raw("DATE_FORMAT(date_start, '%H:%i') AS start_time"),
            DB::raw("DATE_FORMAT(date_end, '%H:%i') AS end_time")
        )
        ->first();

        return response()->json($data, 200);
    }
}
