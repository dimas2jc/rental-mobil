<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function service_datatable()
    {
        $data = DB::table('services')->get();
            return Datatables::of($data)
                ->make(true);
    }
}
