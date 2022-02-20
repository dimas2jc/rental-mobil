<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use Yajra\DataTables\DataTables;

class SalesController extends Controller
{
    /**
     * Date : 14-02-2022
     * Description : Mengambil data sales
     * Developer : Dimas Ihsan
     * Status : Create
     */
    public function sales_datatable(Request $request)
    {
        $data = Sale::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->ID_SALES.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-sales" data-toggle="modal" data-target="#modal-tambah-sales"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
