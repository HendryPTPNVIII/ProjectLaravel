<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home.home');
    }
    
    
    
}
