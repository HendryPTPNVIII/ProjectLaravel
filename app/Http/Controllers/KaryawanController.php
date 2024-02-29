<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class KaryawanController extends Controller
{

    public function karyawan(){
        $datakaryawan = DB::table('karyawan')->get();
        //dd($dataalluser);
        $data['datakaryawan']=$datakaryawan;
        $status=0;
        return view('karyawan.karyawan',compact('datakaryawan'));
    }

    public function view_form_karyawan($id=null){
        if($id){
            $datakaryawan=DB::table('karyawan')->where('id',$id)->first();
            if(isset($datakaryawan)){
                return view('karyawan.form_karyawan',compact('datakaryawan'));
            }
            else {
                return view('karyawan.form_karyawan');
            }
        }
        else {
            return view('karyawan.form_karyawan');
        }
    }
    public function func_store(Request $request){
        //dd($request->name);
        $addkaryawan=[
            'id_subdivisi'=> $request->id_subdivisi,
            'nik'=> $request->nik,
            'nama'=> $request->nama,
            'jabatan'=> $request->jabatan
        ];
        DB::table('karyawan')->insert($addkaryawan);
        return redirect ('/karyawan/karyawan');
    }
    public function func_update(Request $request){
        $idkaryawan=$request->id;
        $addkaryawan=[
            'id_subdivisi'=> $request->id_subdivisi,
            'nik'=> $request->nik,
            'nama'=> $request->nama,
            'jabatan'=> $request->jabatan
        ];
        DB::table('karyawan')->where('id',$idkaryawan)->update($addkaryawan);
        return redirect ('/karyawan/karyawan');
    }
    public function func_delete($id=null){
        DB::table('karyawan')->where('id',$id)->delete();
        return back();

    }
    
}
