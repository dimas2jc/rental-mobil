<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Ramsey\Uuid\Uuid;

class SalesController extends Controller
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
            'phone' => 'required|max:15'
        ]);

        Sale::insert([
            'ID_SALES' => Uuid::uuid4(),
            'NAME_SALES' => $request->name,
            'ADDRESS_SALES' => $request->alamat,
            'PHONE_SALES' => $request->phone,
            'STATUS_SALES' => 1
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

        Sale::where('ID_SALES', $id)->update([
            'ID_SALES' => Uuid::uuid4(),
            'NAME_SALES' => $request->name,
            'ADDRESS_SALES' => $request->alamat,
            'PHONE_SALES' => $request->phone
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

    public function get_sales($id)
    {
        $data = Sale::find($id);

        return response()->json($data, 200);
    }

    public function edit_status_sales($id){
        $sales = Sale::where('id_sales', $id)->first();
        if($sales->status_sales == 1){
            Sale::where('id_sales', $id)->update([
                'status_sales' => 0
            ]);
        }else{
            Sale::where('id_sales', $id)->update([
                'status_sales' => 1
            ]);
        }
        return response()->json($sales, 200);
    }

}
