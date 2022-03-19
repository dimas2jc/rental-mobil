<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function customer_datatable(Request $request)
    {
        $data = Customer::leftJoin('sales', 'sales.id_sales','customer.id_sales')->where('is_blacklist', 0)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a onClick="edit('.$row->id_customer.')" id="edit" class="btn btn-primary btn-sm tombol-tambah-customer" data-toggle="modal" data-target="#modal-tambah-customer"><i class="fa fa-pencil"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function customer_b_datatable(Request $request)
    {
        $data = Customer::leftJoin('sales', 'sales.id_sales','customer.id_sales')->where('is_blacklist', 1)->get();
            return Datatables::of($data)
                ->make(true);
    }
}
