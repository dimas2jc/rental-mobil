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
            'ID_COMPANY' => Uuid::uuid4(),
            'NAME_COMPANY' => $request->name,
            'ADDRESS_COMPANY' => $request->alamat,
            'PHONE_COMPANY' => $request->no_telp,
            'EMAIL_COMPANY' => $request->email,
            'LOGO_COMPANY' => $nama_file
        ]);

        return back();
    }

    public function setting2(Request $request, $id)
    {
        if($request->logo)
        {
            $file = $request->file('logo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('document/setting/', $nama_file);    
        }
        else
        {
            $nama_file = $request->logo;
        }

        Company::where('ID_COMPANY', $id)->update([
            'ID_COMPANY' => Uuid::uuid4(),
            'NAME_COMPANY' => $request->name,
            'ADDRESS_COMPANY' => $request->alamat,
            'PHONE_COMPANY' => $request->no_telp,
            'EMAIL_COMPANY' => $request->email,
            'LOGO_COMPANY' => $nama_file
        ]);
        return back();
    }
}
