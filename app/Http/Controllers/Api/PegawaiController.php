<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployesCompany;
use Yajra\DataTables\DataTables;

class PegawaiController extends Controller
{
    /**
     * Date : 13-02-2022
     * Description : Mengambil data pegawai
     * Developer : Dimas Ihsan
     * Status : Create
     */
    public function pegawai_datatable(Request $request)
    {
        $data = EmployesCompany::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->id_employes.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-pegawai" data-toggle="modal" data-target="#modal-tambah-pegawai"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
