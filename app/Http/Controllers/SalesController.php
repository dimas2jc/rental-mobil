<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Ramsey\Uuid\Uuid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'pass' => 'required',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email_sales' => 'required'
        ]);

        $id = Uuid::uuid4();
        Sale::insert([
            'id_sales' => $id,
            'name_sales' => $request->name,
            'address_sales' => $request->alamat,
            'phone_sales' => $request->phone,
            'email_sales' => $request->email_sales,
            'status_sales' => 1
        ]);
        // $name = explode(" ", $request->name);
        // $password = explode(" ", $request->pass);
        User::insert([
            'id' => $id,
            'username' => $request->name,
            'password' => Hash::make($request->pass),
            'role' => 2, // Sales
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
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

        Sale::where('id_sales', $id)->update([
            'id_sales' => Uuid::uuid4(),
            'name_sales' => $request->name,
            'address_sales' => $request->alamat,
            'phone_sales' => $request->phone,
            'email_sales' => $request->email_sales
        ]);

        User::where('id', $id)->update([
            'email' => $request->email_sales
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
            User::where('id', $id)->update([
                'status' => 0
            ]);
        }else{
            Sale::where('id_sales', $id)->update([
                'status_sales' => 1
            ]);
            User::where('id', $id)->update([
                'status' => 1
            ]);
        }
        return response()->json($sales, 200);
    }

}
