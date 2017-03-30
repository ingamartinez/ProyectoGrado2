<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Redirect;

class LogController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        if(Auth::guard('web_admins')->attempt(['email'=>$request['email'],'password'=>$request['password']])) {
            return redirect()->intended('dashboard');
        }



        return redirect()->back();
    }

    public function Logout()
    {

        if (Auth::guard('web_admins')->check()) {
            Auth::guard('web_admins')->logout();
        }

        return Redirect::to('log');
    }

}
