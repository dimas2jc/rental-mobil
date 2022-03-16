<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class KetentuanController extends Controller
{
    public function datatable()
    {
        $data = DB::table('ketentuan')->get();
            return Datatables::of($data)
                ->make(true);
    }

    public function store(Request $request)
    {
        DB::table('ketentuan')->insert([
            'ketentuan' => $request->ketentuan
        ]);

        return back();
    }

    public function destroy($id)
    {
        DB::table('ketentuan')->where('id', $id)->delete();

        return response()->json(["message" => "ok"], 200);
    }
}
