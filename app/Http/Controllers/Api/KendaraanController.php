<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocumentVehicle;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehiclesVarian;
use App\Models\VehicleBody;
use Yajra\DataTables\DataTables;

class KendaraanController extends Controller
{
    public function kendaraan_datatable(Request $request)
    {
        $data = Vehicle::from('vehicles as ve')
            ->leftJoin('vendor as v', 'v.id_vendors', '=', 've.id_vendors')
            ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 've.id_varian_vehicles')
            ->leftJoin('vehicle_bodies as vb', 'vb.id_vehicle_bodies', '=', 've.id_vehicle_bodies')
            ->leftJoin('document_vehicles as vd', 'vd.id_doc_vehicles', '=', 've.id_doc_vehicles')
            ->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a id="edit" class="btn btn-primary btn-sm tombol-tambah-kendaraan" data-toggle="modal" data-target="#modal-tambah-kendaraan"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function varian_kendaraan_datatable(Request $request)
    {
        $data = VehiclesVarian::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a id="edit" class="btn btn-primary btn-sm tombol-tambah-varian_kendaraan" data-toggle="modal" data-target="#modal-tambah-varian_kendaraan"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function body_kendaraan_datatable(Request $request)
    {
        $data = VehicleBody::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a id="edit" class="btn btn-primary btn-sm tombol-tambah-body" data-toggle="modal" data-target="#modal-tambah-body"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function dokumen_kendaraan_datatable()
    {
        $data = DocumentVehicle::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a id="edit" class="btn btn-primary btn-sm tombol-tambah-dokumen" data-toggle="modal" data-target="#modal-tambah-dokumen"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
