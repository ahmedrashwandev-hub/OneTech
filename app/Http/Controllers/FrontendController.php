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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Mail\ForgetPassword;


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
/*
|--------------------------------------------------------------------------------------------
|                          Create New Account for User
|--------------------------------------------------------------------------------------------
*/
    public function new_account(Request $request)
    {
        if ($request->isMethod('post')) {

            $check = User::where('email', '=', $request->email)->first();

            if (isset($check)) {

                return response()->json(['data' => 0]);

            }else{

            $user = new User();
            $user->name       = strip_tags($request->name);
            $user->password   = Hash::make($request->password);
            $user->email      = strip_tags($request->email);
            $user->created_at = Carbon::now();

            $user->save();

            $user->assignRole('user');
            Auth::login($user);
            return response()->json(['data' => 1]);
            }
        } else {
            return redirect()->route('home');
        }
    }
/*
|--------------------------------------------------------------------------------------------
|                          User forget Password
|--------------------------------------------------------------------------------------------
*/
    public function user_forgot_password()
    {
        return view('auth.forgot-password');
    }
/*
|--------------------------------------------------------------------------------------------
|                          User reset Password
|--------------------------------------------------------------------------------------------
*/
    public function user_reset_password(Request $request)
    {
        if($request->isMethod('post')){

            $check = User::where('email', '=', $request->email)->first();
            if (isset($check)) {
                Mail::to($check->email)->send(new ForgetPassword(route('user.update.password', ['id' => $check->id])));
            }else{
                return response()->json(['data' => 0]);
            }

        }else{
            return redirect()->route('home');
        }

    }

/*
|--------------------------------------------------------------------------------------------
|                          User update Password
|--------------------------------------------------------------------------------------------
*/
    public function user_update_password($id)
    {
        $userID = User::FindOrFail($id);
        return view('auth.update_password',compact('userID'));
    }
/*
|--------------------------------------------------------------------------------------------
|                          User updated New Password
|--------------------------------------------------------------------------------------------
*/
    public function user_updated_password(Request $request)
    {
        if($request->isMethod('post')){
            $user = User::where('id', '=', $request->userID)->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['data' => $user]);
        }else{
            return redirect()->route('home');
        }
    }
/*
|--------------------------------------------------------------------------------------------
|                          Handel 404 Error
|--------------------------------------------------------------------------------------------
*/
    public function error_404(Request $request)
    {
        if(Auth::check()){
            if (Auth::user()->hasRole('admin')) {

                return redirect()->route('dashboard');

            }elseif (Auth::user()->hasRole('user')) {

                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
/*
|--------------------------------------------------------------------------------------------
|                          Handel 403 Error
|--------------------------------------------------------------------------------------------
*/
    public function error_403(Request $request)
    {
        if(Auth::check()){
            if (Auth::user()->hasRole('admin')) {

                return redirect()->route('dashboard');

            }elseif (Auth::user()->hasRole('user')) {

                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
/*
|--------------------------------------------------------------------------------------------
|                          User Logout
|--------------------------------------------------------------------------------------------
*/
    public function user_logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }
}
