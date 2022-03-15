<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB;

class ChargeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required'
        ]);

        DB::table('charge_rent')->insert([
            'id_charge_vehicles' => Uuid::uuid4(),
            'name_charge_vehicles' => $request->name,
            'price_charge_vehicles' => $request->harga,
        ]);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
