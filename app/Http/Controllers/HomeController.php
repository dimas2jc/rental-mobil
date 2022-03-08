<?php

namespace App\Http\Controllers;

use App\Models\EmployesCompany;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function authenticate()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            if(Auth::user()->role == 1){
                return redirect()->route('pegawai');
            }
            elseif(Auth::user()->role == 2){
                return redirect()->route('pegawai');
            }
        }
        session()->flash('error', 'Invalid Username or Password');

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect ('/');
    }

    public function change_password(Request $request)
    {
        if(Hash::check($request->password_old, auth()->user()->password)){
            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->password_new)
            ]);
            session()->flash('success', 'Password berhasil diperbarui.');
        }
        else{
            session()->flash('error', 'Password lama salah.');
        }

        return back();
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user == null){
            session()->flash('error', 'Email tidak ditemukan.');
        }
        else{
            $details = [
                'subject' => env("COMPANY_NAME"),
                'title' => 'Mail from '.env("COMPANY_NAME"),
                'body' => 'Klik link berikut untuk mengganti password anda. '.env('APP_URL').'/change-password-user/'.$user->id
            ];

            \Mail::to($user->email)->send(new \App\Mail\forgotPasswordMail($details));
            session()->flash("message", "Kami telah mengirimkan link ke email anda.");
        }

        return back();
    }

    public function changeForgotPassword($id)
    {
        $id = $id;
        return view('forgot_password', compact('id'));
    }

    public function storeForgotPassword(Request $request)
    {
        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password_new)
        ]);

        return redirect('/login');
    }

    public function username()
    {
        return 'username';
    }
}
