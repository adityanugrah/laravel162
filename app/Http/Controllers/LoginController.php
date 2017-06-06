<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use Session;
use App\Karyawan;

class AuthController extends Controller
{
    //
    public function index()
    {


        return view('dashboard.login.index');
    }

    public function auth(Request $request)
    {
        $input = $request->all();
        if (!Auth::attempt([
            'email'    => $input["email"],
            'password' => $input["password"]
        ])
        ) {
            Flash::error("Email atau password salah, silahkan coba kembali");

            return redirect()->back();
        }

        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
