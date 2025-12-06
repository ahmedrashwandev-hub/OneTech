<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
/*
|--------------------------------------------------------------------------------------------
|                         get all Categories
|--------------------------------------------------------------------------------------------
*/
    public function home() {
        return view('Frontend.index');
    }
    /*
|--------------------------------------------------------------------------------------------
|                          User Login
|--------------------------------------------------------------------------------------------
*/
    public function user_login(Request $request)
    {
        if ($request->isMethod('post')) {

            $check = $request->all();

            if (Auth::guard('web')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
                if (Auth::user()->hasRole('admin')) {
                    return response()->json(['data' => 1]);
                } else {
                    return response()->json(['data' => 2]);
                }
            } else {
                return response()->json(['data' => 0]);
            }
        } else {
            return redirect()->route('home');
        }
    }
}
