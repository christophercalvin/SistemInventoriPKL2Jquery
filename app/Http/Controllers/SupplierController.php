<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index(){
        $title = 'Data Supplier/Toko';
        $data = Supplier::orderBy('id', 'asc')->get();

        return view('supplier.index', compact('title', 'data'));
    }

    public function add(){
        $title = 'Tambah Data Supplier/Toko';

        return view('supplier.add', compact('title'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
        ]);

        $a['nama'] = $request->nama;
        $a['alamat'] = $request->alamat;
        $a['telepon'] = $request->telepon;
        $a['created_at'] = date("Y-m-d H:i:s");
        $a['updated_at'] = date("Y-m-d H:i:s");

        Supplier::insert($a);

        \Session::flash('success','Data Supplier Baru Berhasil di Tambah');

        return redirect('supplier');
    }

    public function edit($id){
        $title = "Edit Data Supplier";
        $data= Supplier::find($id);

        return view('supplier.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
        ]);

        $a['nama'] = $request->nama;
        $a['alamat'] = $request->alamat;
        $a['telepon'] = $request->telepon;
        $a['updated_at'] = date("Y-m-d H:i:s");

        Supplier::where('id', $id)->update($a);

        \Session::flash('success','Data Supplier Berhasil di Ubah');

        return redirect('supplier');
    }

    public function delete($id){
        try{
            Supplier::where('id', $id)->delete();

            \Session::flash('sukses'. 'Data Berhasil Dihapus');
        }
        catch (Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect('supplier');
    }
}
