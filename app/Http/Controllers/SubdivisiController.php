<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SubdivisiController extends Controller
{
    //
    public function index(){
        $data = DB::table('subdivisi')
            ->select('subdivisi.id as id','subdivisi.nama_subdiv as nama_subdiv','divisi.nama_divisi as id_division')
            ->leftjoin('divisi','divisi.id','=','id_division')
            ->get();
       
        // dd($data);
        return view('subdivisi.index',compact('data'));
        

    }
    public function view_form_subdivisi($id=null){
        $items = DB::table('divisi')->pluck('nama_divisi','id');
        if($id){
            $data=DB::table('subdivisi')->where('id',$id)->first();
            if(isset($data)){
                return view('subdivisi.form_subdivisi',compact('data','items'));
            }
            else {
                return view('subdivisi.form_subdivisi',compact('items'));
            }
        }
        else {
            return view('subdivisi.form_subdivisi',compact('items'));
        }
        // dd($items);
    }
    public function func_delete($id=null){
        DB::table('subdivisi')->where('id',$id)->delete();
        return back();

    }
    public function func_store(Request $request){
        // dd($request);
        $addsubdivisi=[
            'nama_subdiv'=> $request->nama_subdivisi,
            'id_division'=> $request->id_division,
           
        ];
        // dd($request);
        DB::table('subdivisi')->insert($addsubdivisi);
        return redirect ('/subdivisi/index');
    }

    public function func_update(Request $request){
        $id=$request->id;
        $addsubdivisi=[
            'nama_subdiv'=> $request->nama_subdivisi,
            'id_division'=> $request->id_division,
        ];
        // dd($adddivisi);
        DB::table('subdivisi')->where('id',$id)->update($addsubdivisi);
        return redirect ('/subdivisi/index');
    }
    
}
