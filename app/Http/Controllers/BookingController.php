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
use PDF;

class BookingController extends Controller
{
    public function store_booking(Request $request)
    {
        $request->validate([
            'vehicle' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'harga' => 'required',
            'dp' => 'required',
            'bukti_bayar' => 'required|max:2048'
        ]);

        $id_sales = null;
        if(auth()->user()->role == 2){
            $id_sales = auth()->user()->id;
        }

        DB::beginTransaction();
        $nopol = Vehicle::find($request->vehicle);

        $file = $request->file('bukti_bayar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('document/bukti_bayar/', $nama_file);

        if($request->sudah_ada == 1){
            $id_customer = $request->customer;
        }
        else{
            $data = Customer::where('no_nik_customer', $request->no_nik)->first();
            if($data != null){
                return back()->with('error', 'NIK sudah ada!');
            }
            $id_customer = Uuid::uuid4();
            Customer::insert([
                'id_customer' => $id_customer,
                'no_kk_customer' => $request->no_kk,
                'name_customer' => $request->name,
                'address_customer' => $request->alamat,
                'phone_customer' => $request->no_telp,
                'email_customer' => $request->email,
                'no_nik_customer' => $request->nik,
                'id_sales' => $id_sales,
                'is_blacklist' => 0
            ]);
        }

        $customer = Customer::where('id_customer', $id_customer)->first();
        if($customer-> is_blacklist == 1){
            return back()->with("error", "Customer ".$customer->name_customer." dengan NIK ".$customer->no_nik_customer." telah diblokir");
        }

        $date_start = $request->start_date." ".$request->start_time;
        $date_end = $request->end_date." ".$request->end_time;

        // Cek user
        $id_user = null;
        if(auth()->user()->role == 2){
            $id_user = auth()->user()->id;
        }

        $id_booking = Uuid::uuid4();
        $id_payment = Uuid::uuid4();
        Booking::insert([
            'id_booking' => $id_booking,
            'id_customer' => $id_customer,
            'id_vehicles' => $request->vehicle,
            'id_sales' => $id_user,
            'date_start' => date("Y-m-d H:i:s", strtotime($date_start)),
            'date_finish' => date("Y-m-d H:i:s", strtotime($date_end)),
            'price_sales' => $request->harga,
            'dp_sales' => $request->dp,
            'status_booking' => 1, // init (belum di approve)
            'komisi_sales' => $request->harga - $request->real_price,
            'real_price' => $request->real_price,
            'id_service' => $request->service
        ]);

        PaymentRent::insert([
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
            'bukti' => $nama_file,
            'timestamps' => Carbon::now()
        ]);

        DB::commit();

        return back();
    }

    public function update_booking(Request $request)
    {
        // $request->validate([
        //     'vehicle' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'harga' => 'required',
        //     'dp' => 'required'
        // ]);

        DB::beginTransaction();
        $date_start = strtotime($request->update_start_date." ".$request->update_start_time.":00");
        $date_end = strtotime($request->update_end_date." ".$request->update_end_time.":00");
        $jam_now = abs($date_end - $date_start)/(60*60);
        // dd(abs($date_start-$date_end));

        $booking = Booking::where('booking.id_booking', $request->id_booking_update)
        ->leftJoin('detail_payment', 'detail_payment.id_booking', 'booking.id_booking')
        ->first();
        if($request->kendaraan_sama == 1){
            $id_vehicle = $booking->id_vehicles;
        }
        else{
            $id_vehicle = $request->vehicle;
        }
        $jam = abs(strtotime($booking->date_finish) - strtotime($booking->date_start))/(60*60);
        $real_price_before = (24 / $jam) * $booking->real_price;
        $real_price = ($jam_now / 24) * $real_price_before;


        Booking::where('id_booking', $request->id_booking_update)->update([
            'id_vehicles' => $id_vehicle,
            'date_start' => date("Y-m-d H:i:s", $date_start),
            'date_finish' => date("Y-m-d H:i:s", $date_end),
            'price_sales' => $request->harga_update,
            'dp_sales' => $request->dp_update,
            'status_booking' => 3, // reschedule
            'komisi_sales' => $request->harga_update - $real_price,
            'real_price' => $real_price
        ]);

        PaymentRent::where('id_payment_rent', $booking->id_payment_rent)->update([
            'total_payment' => $request->harga_update,
            'date_payment' => Carbon::now()
        ]);

        // DetailPayment::insert([
        //     'id_booking' => $id_booking,
        //     'id_payment_rent' => $id_payment,
        //     'price' => $request->dp,
        //     'description' => "DP - ".$nopol->nopol." - Untuk tgl ".$date_start." sampai ".$date_end,
        //     'timestamps' => Carbon::now()
        // ]);

        DB::commit();

        return back();
    }

    public function get_booking()
    {
        $data = Booking::leftJoin('customer', 'customer.id_customer', 'booking.id_customer')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', 'vehicles.id_varian_vehicles')
        ->leftJoin('sales', 'sales.id_sales', 'booking.id_sales')
        ->select('booking.*', 'vehicles.nopol', 'vehicles.id_vehicles', 'customer.name_customer', 'sales.name_sales',
        DB::raw("CONCAT(vv.nama_varian, ' ', vv.vehicles_type) AS kendaraan"),
        DB::raw("(
            CASE
                WHEN status_booking = 0 THEN '0'
                WHEN status_booking = 1 THEN '1'
                WHEN status_booking = 2 THEN '2'
                WHEN status_booking = 3 THEN '3'
            END
        ) AS status"))
        ->get();

        foreach ($data as $key => $value) {
            $value->date_finish_temp = $value->date_finish->addDays(1);
        }

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

        $data = Vehicle::whereNotIn('id_vehicles', $id_vehicle)
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', 'vehicles.id_varian_vehicles')
        ->select('vehicles.id_vehicles', DB::raw("CONCAT(vv.nama_varian, ' ', vv.vehicles_type) AS name"), 'vehicles.nopol')
        ->get();

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
        // dd(abs($end_date - $start_date));

        return response()->json($data, 200);
    }

    public function get_reschedule_booking($id)
    {
        $data = Booking::leftJoin('customer', 'customer.id_customer', 'booking.id_customer')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->where('id_booking', $id)
        ->select(
            '*',
            DB::raw("DATE_FORMAT(booking.date_start, '%m/%d/%Y') AS start_date"),
            DB::raw("DATE_FORMAT(booking.date_finish, '%m/%d/%Y') AS end_date"),
            DB::raw("DATE_FORMAT(booking.date_start, '%H:%i') AS start_time"),
            DB::raw("DATE_FORMAT(booking.date_finish, '%H:%i') AS end_time"),
            'customer.name_customer as name',
            'vehicles.id_vehicles',
            'vehicles.nopol'
        )
        ->first();

        return response()->json($data, 200);
    }

    public function approve($id){
        Booking::where('id_booking', $id)->update([
            'status_booking' => 2, // status approved
            'id_employes' => auth()->user()->id
        ]);

        return response()->json(200);
    }

    public function get_all_service()
    {
        $data = DB::table('services')->where('status', 1)->get();

        return response()->json($data, 200);
    }

    public function detail_booking($id)
    {
        $detail = Booking::where('id_booking', $id)
        ->leftJoin('customer' , 'customer.id_customer', 'booking.id_customer')
        ->leftJoin('sales', 'sales.id_sales', 'booking.id_sales')
        ->leftJoin('vehicles', 'vehicles.id_vehicles', 'booking.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', 'vehicles.id_varian_vehicles')
        ->select(
            'booking.*',
            DB::raw("(
                CASE
                    WHEN booking.status_booking = 1 THEN 'Belum Disetujui'
                    WHEN booking.status_booking = 2 THEN 'Disetujui'
                    WHEN booking.status_booking = 3 THEN 'Dijadwalkan Ulang'
                    WHEN booking.status_booking = 4 THEN 'Diambil'
                    WHEN booking.status_booking = 5 THEN 'Dikembalikan/Selesai'
                END
            ) AS status"),
            'customer.name_customer',
            'sales.name_sales',
            DB::raw("CONCAT(vv.nama_varian, ' ', vv.vehicles_type, ' / ', vehicles.nopol) AS kendaraan"),
            'vehicles.nopol'
        )
        ->first();
        // dd($detail);
        $bukti = DB::table('detail_payment')->where('description', 'like', '%DP%')->where('id_booking', $detail->id_booking)->first();
        $checklist = DB::table('checklist')->where('id_booking', $id)->orderBy('nama', 'ASC')->get();
        $form_checklist = DB::table('vehicle_bodies')->where(['id_vehicles' => $detail->id_vehicles, 'is_active' => 1])->orderBy('name_vehicles_bodies', 'ASC')->get();

        return view('detail_list_booking', compact('detail', 'checklist', 'form_checklist', 'bukti'));
    }

    public function checklist(Request $request, $id)
    {
        DB::table('checklist')->where(['id_booking' => $id, 'status' => $request->status])->delete();
        $form_checklist = DB::table('vehicle_bodies')->where('vehicles.is_active', 1)
        ->leftJoin('booking', 'booking.id_vehicles', 'vehicle_bodies.id_vehicles')
        ->orderBy('name_vehicles_bodies', 'ASC')
        ->select('vehicle_bodies.name_vehicles_bodies as name')
        ->get();

        $params = [];
        for ($i=0; $i < count($form_checklist); $i++) {
            if($request->checklist[$i] == 'on'){
                $cek = 1;
            }
            else{
                $cek = 0;
            }
            $params[] = [
                'id_booking' => $id,
                'nama' => $form_checklist[$i]->name,
                'cek' => $cek,
                'status' => $request->status
            ];
        }

        if($request->status == 0){
            $status_booking = 4;
        }
        else if($request->status == 1){
            $status_booking = 5;
        }

        DB::table('checklist')->insert($params);
        DB::table('booking')->where('id_booking', $id)->update([
            'status_booking' => $status_booking
        ]);

        return back();
    }

    public function closing()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();
        // dd(date("Y-m-d", strtotime($endOfWeek)));

        $booking = Booking::leftJoin('detail_payment as dp', 'dp.id_booking', 'booking.id_booking')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', 'dp.id_payment_rent')
        ->whereBetween('booking.date_finish', [$startOfWeek, $endOfWeek])
        ->where('booking.is_closing', 0)
        ->where('pr.status_payment', 1)
        ->orWhereRaw("DATE(booking.date_finish) < ".date("Y-m-d H:i:s", strtotime($endOfWeek))." AND booking.is_closing = 0 AND pr.status_payment = 1")
        ->groupBy('booking.id_booking')
        ->select('booking.id_booking')
        ->get()->toArray();

        $id = [];
        for ($i=0; $i < count($booking); $i++) {
            $id[$i] = $booking[$i]['id_booking'];
        }

        Booking::whereIn('id_booking', $id)->update([
            'is_closing' => 1,
            'tanggal_closing' => Carbon::now()->format("Y-m-d")
        ]);

        return back();
    }

    public function print_checklist($id){
        $pdf = PDF::loadview('print_checklist',compact( 'id'))->setPaper('A4', 'potrait');
        return $pdf->stream('Checklist-'.$id.'.pdf');
    }
}
