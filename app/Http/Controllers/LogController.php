<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Redirect;

class LogController extends Controller
{
    function __construct()
    {
        $this->middleware('guest:web_admins',['except' => array('Logout')]);
    }

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        if(Auth::guard('web_admins')->attempt(['email'=>$request['email'],'password'=>$request['password']])) {
            return redirect()->intended('admin/dashboard');
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
