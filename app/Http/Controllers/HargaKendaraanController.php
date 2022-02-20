<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceVehicle;

class HargaKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'harga' => 'required',
            'waktu' => 'required'
        ]);

        PriceVehicle::insert([
            'ID_PRICE_VEHICLES' => $request->kendaraan,
            'PRICE_VEHICLES' => $request->harga,
            'TIME_RENT' => $request->waktu
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required',
            'waktu' => 'required'
        ]);

        PriceVehicle::where('ID_VEHICLES', $id)->update([
            'ID_PRICE_VEHICLES' => $request->kendaraan,
            'PRICE_VEHICLES' => $request->harga,
            'TIME_RENT' => $request->waktu
        ]);

        return redirect()->back();
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

    public function get_harga_kendaraan($id)
    {
        $data = PriceVehicle::find($id);

        return response()->json($data, 200);
    }
}
