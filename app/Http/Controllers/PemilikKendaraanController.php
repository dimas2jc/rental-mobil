<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Ramsey\Uuid\Uuid;

class PemilikKendaraanController extends Controller
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
            'name' => 'required|string|max:60|regex:/^[a-zA-Z ]+$/',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email' => 'required'
        ]);

        Vendor::insert([
            'ID_VENDORS' => Uuid::uuid4(),
            'NAME_VENDRS' => $request->name,
            'ADDRESS_VENDORS' => $request->alamat,
            'PHONE_VENDORS' => $request->phone,
            'EMAIL_VENDORS' => $request->email
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
            'name' => 'required|string|max:60|regex:/^[a-zA-Z ]+$/',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email' => 'required'
        ]);

        Vendor::where('ID_VENDORS', $id)->update([
            'ID_VENDORS' => Uuid::uuid4(),
            'NAME_VENDRS' => $request->name,
            'ADDRESS_VENDORS' => $request->alamat,
            'PHONE_VENDORS' => $request->phone,
            'EMAIL_VENDORS' => $request->email
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

    public function get_pemilik_kendaraan($id)
    {
        $data = Vendor::find($id);

        return response()->json($data, 200);
    }
}
