<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB;

class CompanyController extends Controller
{
    public function setting1(Request $request)
    {
        $file = $request->file('logo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('document/setting/', $nama_file);

        Company::insert([
            'id_company' => Uuid::uuid4(),
            'name_company' => $request->name,
            'address_company' => $request->alamat,
            'phone_company' => $request->no_telp,
            'email_company' => $request->email,
            'logo_company' => $nama_file
        ]);

        return back();
    }

    public function setting2(Request $request, $id)
    {
        $data = Company::where('id_company', $id)->first();
        if($request->file('logo'))
        {
            $file = $request->file('logo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('document/setting/', $nama_file);
        }
        else
        {
            $nama_file = $data->logo_company;
        }

        Company::where('id_company', $id)->update([
            // 'id_company' => Uuid::uuid4(),
            'name_company' => $request->name,
            'address_company' => $request->alamat,
            'phone_company' => $request->no_telp,
            'email_company' => $request->email,
            'logo_company' => $nama_file
        ]);
        return back();
    }
}
