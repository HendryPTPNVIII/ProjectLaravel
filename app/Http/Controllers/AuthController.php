<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('/user/index');

        }
        else {
            return view('login.index');
        }
       

    }
    public function func_login(Request $request){
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if(Auth::attempt($credentials)){
            return redirect('/user/index');
        }
        else {
            dd('error');
        }
    }
    public function func_logout(Request $request){
        Auth::logout();
        //$request->session()->invalidate();
        //$request->session()->regeneratetoken();
        return redirect('/login');
    }
    
    
}
