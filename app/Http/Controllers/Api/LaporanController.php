<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan_datatable(Request $request)
    {
        $data = Booking::from('booking as b')
            ->leftJoin('detail_payment as dp', 'dp.id_booking', '=', 'b.id_booking')
            ->leftJoin('payment_rent as pr', 'pr.id_payment_rent', '=', 'dp.id_payment_rent')
            ->leftJoin('customer as c', 'c.id_customer', '=', 'b.id_customer')
            ->leftJoin('sales as s', 's.id_sales', '=', 'b.id_sales')
            ->leftJoin('employes_company as ec', 'ec.id_employes', '=', 'b.id_employes')
            ->leftJoin('vehicles as v', 'v.id_vehicles', '=', 'b.id_vehicles')
            ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 'v.id_varian_vehicles')
            ->select('b.id_booking as id_booking', 'c.name_customer as name_customer', 'b.date_start as date_start', 'b.date_finish as date_finish', 's.name_sales as name_sales',
            'c.name_customer as user', 'pr.total_payment as price_user', 'b.dp_sales as dp_sales', 'dp.description as description', DB::raw("CONCAT(vv.nama_varian, ' - ', vv.vehicles_type) AS type_unit"))
            ->groupBy('id_booking', 'type_unit', 'name_customer', 'date_start', 'date_finish', 'name_sales', 'user', 'price_user', 'dp_sales', 'description')
            // ->where('b.status_booking', 4)
            ->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->id_booking.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-pegawai" data-toggle="modal" data-target="#modal-tambah-pegawai"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

}
