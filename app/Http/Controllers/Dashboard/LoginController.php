<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
//use http\Env\Request;

class LoginController extends Controller
{
    public function  Login(){
        return view('dashboard.auth.login');
    }
    public function postlogin(AdminLoginRequest $request){
        $remember_me = $request -> has('remember_me') ? true : false;
        if(auth()->guard('admin')->attempt(['email' => $request -> input("email") , 'password' => $request -> input("password")] , $remember_me)){

            // notyfy() -> success ("تم الدخول بنجاح ");
            return redirect() -> route('admin.dashboard');

        }
            //notyfy() -> error ("خطاء في البيانات برجاء المحاولة مرة اخري ");
            return redirect() -> back() -> with(['error' => 'هناك خطاء في البيانات ']);
    }


}
