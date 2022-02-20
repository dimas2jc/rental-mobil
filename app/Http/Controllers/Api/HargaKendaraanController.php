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
        $data = PriceVehicle::leftJoin('vehicles', 'vehicles.ID_VEHICLES', 'price_vehicles.ID_VEHICLES')
        ->leftJoin('vehicles_varians', 'vehicles_varians.ID_VARIAN_VEHICLES', 'vehicles.ID_VARIAN_VEHICLES')
        ->select('price_vehicles.*', 'vehicles_varians.NAMA_VARIAN', 'vehicles_varians.KAPASITAS_BBM')
        ->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->ID_VEHICLES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-harga" data-toggle="modal" data-target="#modal-tambah-harga"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
