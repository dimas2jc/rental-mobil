<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use PDF;
use DB;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan');
    }

    public function cetak($id){
        $data['data'] = DB::table('booking as b')
        ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
        ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
        ->leftJoin('employes_company as ec', 'ec.id_employes', '=', 'b.id_employes')
        ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
        ->select('b.id_booking as id_booking', 'v.nopol as nopol', 'v.tahun_pembuatan as tahun_pembuatan', 'ec.id_employes as id_employes', 'c.name_customer as name_customer', 'vv.vehicles_type as type_unit', 'b.date_start as date_start', 'b.date_finish as date_finish', 's.name_sales as name_sales',
        'c.name_customer as user', 'pr.total_payment as price_user', 'b.dp_sales as dp_sales', 'dp.description as description')
        ->groupBy('id_booking', 'type_unit', 'id_employes', 'nopol', 'tahun_pembuatan', 'name_customer', 'date_start', 'date_finish', 'name_sales', 'user', 'price_user', 'dp_sales', 'description')
        ->where('b.id_booking', $id)
        ->first();

        $header = Company::first();
        $data['company'] = $header;
        // dd($data);
        $pdf = PDF::loadview('laporan_cetak', compact('data', 'id'))->setPaper('A4', 'landscape');
        return $pdf->stream('Invoice-'.$id.'.pdf');
    	// return $pdf->download('laporan-Invoice');
    }
}
