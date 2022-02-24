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
            'name' => 'required|string|max:60',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15',
        ]);

        EmployesCompany::insert([
            'id_employes' => Uuid::uuid4(),
            'name_employes' => $request->name,
            'address_employes' => $request->alamat,
            'phone_employes' => $request->phone,
            'status_employes' => 1
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
            'name' => 'required|string|max:60',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15'
        ]);

        EmployesCompany::where('id_employes', $id)->update([
            'id_employes' => Uuid::uuid4(),
            'name_employes' => $request->name,
            'address_employes' => $request->alamat,
            'phone_employes' => $request->phone
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
        $data['pegawai'] = EmployesCompany::count('id_employes');
        $data['vendor'] = Vendor::count('id_vendors');
        $data['vehicle'] = Vehicle::count('id_Vehicles');

        return response()->json($data, 200);
    }

    public function get_pegawai($id)
    {
        $data = EmployesCompany::find($id);

        return response()->json($data, 200);
    }

    public function edit_status_pegawai($id){
        $employes = EmployesCompany::where('id_employes', $id)->first();
        if($employes->status_employes == 1){
            EmployesCompany::where('id_employes', $id)->update([
                'status_employes' => 0
            ]);
        }else{
            EmployesCompany::where('id_employes', $id)->update([
                'status_employes' => 1
            ]);
        }
        return response()->json($employes, 200);
    }
}
