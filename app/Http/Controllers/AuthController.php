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
        $validate = Validator::make($request->all(), [
            'username' => 'required|min:5',
            'password' => 'required',
        ],[
            'username.required' => 'username is must.',
            'username.required' => 'password is must.',
            'username.min' => 'username must have 5 char.',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if(Auth::attempt($credentials)){
            return redirect('/user/index');
        }
        else {
            return back()->with('error','username paswword salah');
        }
    }
    public function func_logout(Request $request){
        Auth::logout();
        //$request->session()->invalidate();
        //$request->session()->regeneratetoken();
        return redirect('/login');
    }
    
    
}
