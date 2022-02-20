<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CompanyController extends Controller
{
    public function setting(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('document/setting/', $nama_file);

        Company::insert([
            'ID_COMPANY' => Uuid::uuid4(),
            'NAME_COMPANY' => $request->name,
            'ADDRESS_COMPANY' => $request->alamat,
            'PHONE_COMPANY' => $request->no_telp,
            'EMAIL_COMPANY' => $request->email,
            'LOGO' => $nama_file
        ]);

        return back();
    }
}
