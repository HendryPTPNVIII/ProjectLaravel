<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class RegionalController extends Controller
{

    public function regional(){
        $dataregional = DB::table('regional')->get();
        //dd($dataalluser);
        $data['dataregional']=$dataregional;
        $status=0;
        return view('regional.regional',compact('dataregional'));
    }

    public function view_form_regional($id=null){
        if($id){
            $dataregional=DB::table('regional')->where('id_regional',$id)->first();
            if(isset($dataregional)){
                return view('regional.form_regional',compact('dataregional'));
            }
            else {
                return view('regional.form_regional');
            }
        }
        else {
            return view('regional.form_regional');
        }
    }
    public function func_store(Request $request){
        //dd($request->name);
        $addregional=[
            'kode_regional'=> $request->kode_regional,
            'nama'=> $request->nama,
            'email'=> $request->email
        ];
        DB::table('regional')->insert($addregional);
        return redirect ('/regional/regional');
    }
    public function func_update(Request $request){
        $idregional=$request->id;
        $addregional=[
            'kode_regional'=> $request->kode_regional,
            'nama'=> $request->nama,
            'email'=> $request->email
        ];
        DB::table('regional')->where('id_regional',$idregional)->update($addregional);
        return redirect ('/regional/regional');
    }
    public function func_delete($id=null){
        DB::table('regional')->where('id_regional',$id)->delete();
        return back();

    }
    
}
