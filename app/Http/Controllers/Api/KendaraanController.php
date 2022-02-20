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
        $data = Vehicle::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->ID_VEHICLES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-kendaraan" data-toggle="modal" data-target="#modal-tambah-kendaraan"><i class="fa fa-pencil"></i></a>';
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
                    $btn = '<a onClick="edit('.$row->ID_VARIAN_VEHICLES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-varian_kendaraan" data-toggle="modal" data-target="#modal-tambah-varian_kendaraan"><i class="fa fa-pencil"></i></a>';
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
                    $btn = '<a onClick="edit('.$row->ID_VEHICLE_BODIES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-body" data-toggle="modal" data-target="#modal-tambah-body"><i class="fa fa-pencil"></i></a>';
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
                    $btn = '<a onClick="edit('.$row->ID_DOC_VEHICLES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-dokumen" data-toggle="modal" data-target="#modal-tambah-dokumen"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
