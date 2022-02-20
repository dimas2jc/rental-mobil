<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployesCompany;
use App\Models\Vendor;
use App\Models\Vehicle;
use Ramsey\Uuid\Uuid;

class PegawaiController extends Controller
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
            'phone' => 'required|max:15'
        ]);

        EmployesCompany::insert([
            'ID_EMPLOYES' => Uuid::uuid4(),
            'NAME_EMPLOYES' => $request->name,
            'ADDRESS_EMPLOYES' => $request->alamat,
            'PHONE_EMPLOYES' => $request->phone
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
            'phone' => 'required|max:15'
        ]);

        EmployesCompany::where('ID_EMPLOYES', $id)->update([
            'ID_EMPLOYES' => Uuid::uuid4(),
            'NAME_EMPLOYES' => $request->name,
            'ADDRESS_EMPLOYES' => $request->alamat,
            'PHONE_EMPLOYES' => $request->phone
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

    public function data_master()
    {
        $data['pegawai'] = EmployesCompany::count('ID_EMPLOYES');
        $data['vendor'] = Vendor::count('ID_VENDORS');
        $data['vehicle'] = Vehicle::count('ID_VEHICLES');

        return response()->json($data, 200);
    }

    public function get_pegawai($id)
    {
        $data = EmployesCompany::find($id);

        return response()->json($data, 200);
    }
}
