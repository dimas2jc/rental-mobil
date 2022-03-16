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
        ->leftJoin('services as sv', 'sv.id', '=', 'b.id_service')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        ->leftJoin('detail_charge as dc', 'dc.id_payment_rent', '=', 'pr.id_payment_rent')
        ->leftJoin('charge_rent as cr', 'cr.id_charge_vehicles', '=', 'dc.id_charge_vehicles')
        ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
        ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
        ->leftJoin('employes_company as ec', 'ec.id_employes', '=', 'b.id_employes')
        ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
        ->select('b.id_booking as id_booking', 'sv.name_service as name_service', 'cr.name_charge_vehicles as name_charge', 'cr.price_charge_vehicles as price_charge', 'pr.id_payment_rent as id_payment', 'v.nopol as nopol', 'v.tahun_pembuatan as tahun_pembuatan', 'ec.id_employes as id_employes', 'c.name_customer as name_customer', 'vv.vehicles_type as type_unit', 'b.date_start as date_start', 'b.date_finish as date_finish', 's.name_sales as name_sales',
        'ec.name_employes as name_employess', 'pr.total_payment as price_user', 'b.dp_sales as dp_sales', 'dp.description as description')
        ->groupBy('id_booking', 'type_unit', 'name_service', 'name_charge', 'price_charge', 'id_payment', 'id_employes', 'nopol', 'tahun_pembuatan', 'name_customer', 'date_start', 'date_finish', 'name_sales', 'name_employess', 'price_user', 'dp_sales', 'description')
        ->where('b.id_booking', $id)
        ->first();

        $charge = DB::table('detail_payment as dp')
        ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
        ->leftJoin('detail_charge as dc', 'dc.id_payment_rent', '=', 'pr.id_payment_rent')
        ->leftJoin('charge_rent as cr', 'cr.id_charge_vehicles', '=', 'dc.id_charge_vehicles')
        ->select('cr.name_charge_vehicles as name_charge', 'cr.price_charge_vehicles as price_charge')
        ->groupBy('name_charge', 'price_charge')
        ->where('dp.id_booking', $id)
        ->get();

        $header = Company::first();
        $data['company'] = $header;
        // dd($data['company']->address_company);
        $pdf = PDF::loadview('laporan_cetak', compact('data', 'id', 'charge'))->setPaper('A4', 'landscape');
        return $pdf->stream('Invoice-'.$id.'.pdf');
    	// return $pdf->download('laporan-Invoice');
    }
}
