<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenanggungJawab;

class PenanggungJawabController extends Controller
{
    public function index(){
        $title='Update Data Penanggung Jawab';

        $data=PenanggungJawab::first();

        return view('penanggung_jawab.index',compact('title','data'));
    }

    public function update(Request $request){
        try {
            $dt=PenanggungJawab::first();

            $a=$request->except(['_token','_method']);
            $a['updated_at']=date('Y-m-d H:i:s');

            PenanggungJawab::where('id',$dt->id)->update($a);

            \Session::flash('sukses','Data Berhasil Diubah');
            
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }
}
