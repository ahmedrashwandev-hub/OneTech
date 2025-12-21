<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class BackendController extends Controller
{
    public function dashboard()
    {
        return view('backend.index');
    } // end method
    public function user_logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    } // end method
}
