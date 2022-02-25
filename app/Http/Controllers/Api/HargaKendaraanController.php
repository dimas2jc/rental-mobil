<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PriceVehicle;
use Yajra\DataTables\DataTables;

class HargaKendaraanController extends Controller
{
    public function harga_kendaraan_datatable(Request $request)
    {
        $data = PriceVehicle::leftJoin('vehicles', 'vehicles.id_vehicles', 'price_vehicles.id_vehicles')
        ->leftJoin('vehicles_varians', 'vehicles_varians.id_varian_vehicles', 'vehicles.id_varian_vehicles')
        ->select('price_vehicles.*', 'vehicles_varians.nama_varian', 'vehicles_varians.kapasitas_bbm', 'vehicles.*')
        ->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->id_vehicles.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-harga" data-toggle="modal" data-target="#modal-tambah-harga"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
