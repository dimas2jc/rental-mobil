<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Ramsey\Uuid\Uuid;
use DB;

class CustomerController extends Controller
{
    public function get_customer($id)
    {
        $data = Customer::find($id);

        return response()->json($data, 200);
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'no_nik' => 'required',
            'name' => 'required|string|max:60',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'email' => 'required',
        ]);

        if($id!=null){
            Customer::where('id_customer', $id)->update([
                'no_kk_customer' => $request->no_kk,
                'no_nik_customer' => $request->no_nik,
                'name_customer' => $request->name,
                'address_customer' => $request->alamat,
                'phone_customer' => $request->phone,
                'sosmed_customer' => $request->sosmed,
                'email_customer' => $request->email
            ]);
        }
        else{
            Customer::insert([
                'id_customer' => Uuid::uuid4(),
                'no_kk_customer' => $request->no_kk,
                'no_nik_customer' => $request->no_nik,
                'name_customer' => $request->name,
                'address_customer' => $request->alamat,
                'phone_customer' => $request->phone,
                'sosmed_customer' => $request->sosmed,
                'email_customer' => $request->email
            ]);
        }

        return redirect()->back();
    }

    public function edit_status_customer($id){
        $id_customer = DB::table('customer')->where('id_customer', $id)->first();
        $status_customer = DB::table('customer')->select('no_kk_customer')->where('id_customer', $id)->max('no_kk_customer');
        // dd($status_customer);
        $customer = DB::table('customer')->where('no_kk_customer', $status_customer)->get();
        // $all_customer = Customer::all();
        if($id_customer->no_kk_customer != null){
            // dd($status_customer);
            for($i=0;$i<count($customer);$i++){
                if($customer[$i]->is_blacklist == 0){
                    Customer::where('no_kk_customer', $status_customer)->update([
                        'is_blacklist' => 1
                    ]);
                }
                return response()->json($id_customer, 200);

            }
        }else{
            Customer::where('id_customer', $id)->update([
                'is_blacklist' => 1
            ]);
            return response()->json($id_customer, 200);
        }
    }

}
