<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PemilikKendaraanController extends Controller
{
    public function pemilik_kendaraan_datatable(Request $request)
    {
        $data = Vendor::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->ID_VENDORS.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-pemilik_kendaraan" data-toggle="modal" data-target="#modal-tambah-pemilik_kendaraan"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
