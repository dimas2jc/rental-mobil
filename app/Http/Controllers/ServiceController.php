<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        Db::table('services')->insert([
            'name_service' => $request->nama,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return back();
    }

    public function update_status($id)
    {
        $data = DB::table('services')->where('id', $id)->first();
        $status = null;
        if($data->status == 0){
            $status = 1;
        }
        else{
            $status = 0;
        }

        DB::table('services')->where('id', $id)->update([
            'status' => $status
        ]);

        return response()->json(200);
    }
}
