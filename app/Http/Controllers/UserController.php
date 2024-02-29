<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $bagiankhusus =['LK01','LK02'];
        $dataalluser = DB::table('users')
        //->where('username','like','hangga%')
        //->leftjoin('tbl_bagian', function($join){
          //  $join->on('users.bagian','=','tbl_bagian.bagian');
            //$join->on('users.kota','=','tbl_bagian.kota');
        //})
        //->where('password','12345')
        //->whereIn('tbl.bagian.kode_bagian',$bagiankhusus)
        //->whereRaw('(username like "%Hendry%" or password ="12345")')
        
        ->get();
        //dd($dataalluser);
        $data['dataalluser']=$dataalluser;
        $status=0;
        //ini pakai compact
        return view('user.user',compact('dataalluser'));
        //ini pakai array
        //return view('user.user',$data);

    }

    public function listuser(){
        $dataalluser = DB::table('users')->get();
        //dd($dataalluser);
        $data['dataalluser']=$dataalluser;
        $status=0;
        return view('user.listuser',compact('dataalluser'));
        }

    public function view_form_user($id=null){
        if($id){
            $datauser=DB::table('users')->where('id',$id)->first();
            if(isset($datauser)){
                return view('user.form_user',compact('datauser'));
            }
            else {
                return view('user.form_user');
            }
        }
        else {
            return view('user.form_user');
        }
    }
    public function func_store(Request $request){
        //dd($request->name);
        $adduser=[
            'name'=> $request->name,
            'username'=> $request->username,
            'password'=> bcrypt($request->password),
            'bagian'=> $request->bagian,
            'api_token'=> bcrypt($request->api_token),
            'email'=> $request->email
        ];
        DB::table('users')->insert($adduser);
        return redirect ('/user/index');
    }
    public function func_update(Request $request){
        $iduser=$request->id;
        $adduser=[
            'name'=> $request->name,
            'username'=> $request->username,
            //'password'=> bcrypt($request->password),
            'bagian'=> $request->bagian,
            //'api_token'=> bcrypt($request->api_token),
            'email'=> $request->email
        ];
        DB::table('users')->where('id',$iduser)->update($adduser);
        return redirect ('/user/listuser');
    }
    public function func_delete($id=null){
        DB::table('users')->where('id',$id)->delete();
        return back();

    }
    
}
