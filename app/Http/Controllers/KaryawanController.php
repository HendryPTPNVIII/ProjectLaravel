<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class KaryawanController extends Controller
{

    public function karyawan(){
        $datakaryawan = DB::table('karyawan')->select('karyawan.id as id','karyawan.nik as nik','karyawan.nama as nama','karyawan.jabatan as jabatan','subdivisi.nama_subdiv as namasubdivisi','divisi.nama_divisi as namadivisi','regional.nama as namaregional')
        ->leftjoin('subdivisi', function($join){
            $join->on('karyawan.id_subdivisi','=','subdivisi.id');             
          })
        ->leftjoin('divisi', function($join){
            $join->on('subdivisi.id_division','=','divisi.id');             
          })
          ->leftjoin('regional', function($join){
            $join->on('divisi.id_regional','=','regional.id_regional');             
          })
        ->get();
        //dd($datakaryawan);
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
