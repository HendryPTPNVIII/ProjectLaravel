<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    //
    public function index(){
        $data = DB::table('divisi')  
        ->get();
       
        // dd($data);
        return view('divisi.index',compact('data'));
        

    }
    public function view_form_divisi($id=null){
        $items = DB::table('regional')->pluck('nama','id_regional');
        $tipe = ["DIVISI","BAGIAN","UNIT"];
        if($id){
            $data=DB::table('divisi')->where('id',$id)->first();
            if(isset($data)){
                return view('divisi.form_divisi',compact('data','items','tipe'));
            }
            else {
                return view('divisi.form_divisi',compact('tipe','items'));
            }
        }
        else {
            return view('divisi.form_divisi',compact('tipe','items'));
        }
        // dd($items);
    }
    public function func_store(Request $request){
        //dd($request->name);
        $adddivisi=[
            'nama_divisi'=> $request->nama_divisi,
            'kode_divisi'=> $request->kode_divisi,
            'id_regional'=> $request->id_regional,
            'tipe_org'=> $request->tipe_org,
           
        ];
        DB::table('divisi')->insert($adddivisi);
        return redirect ('/divisi/index');
    }
    public function func_delete($id=null){
        DB::table('divisi')->where('id',$id)->delete();
        return back();

    }
    public function func_update(Request $request){
        $id=$request->id;
        $adddivisi=[
            'nama_divisi'=> $request->nama_divisi,
            'kode_divisi'=> $request->kode_divisi,
            'id_regional'=> $request->id_regional,
            'tipe_org'=> $request->tipe_org,
           
        ];
        // dd($adddivisi);
        DB::table('divisi')->where('id',$id)->update($adddivisi);
        return redirect ('/divisi/index');
    }
}
