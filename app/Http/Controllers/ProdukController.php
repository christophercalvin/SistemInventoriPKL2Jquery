<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Supplier;

class ProdukController extends Controller
{
    public function index()
    {
        $title="Daftar Produk";

        $data=Produk::orderBy('nama','asc')->get();

        return view('produk.index',compact('title','data'));
    }

    public function add()
    {
        $title="Tambah Produk";
        $supplier = Supplier::get(); 
        $kode = rand();

        return view('produk.tambah', compact('title', 'supplier','kode'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'supplier'=>'required',
            'nama'=>'required',
            'kode'=>'required',
            'stock'=>'required',
            'minimal_stock'=>'required',
            'harga'=>'required',
        ]);

        $data=$request->except(['_token']);
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        
        Produk::insert($data);
        \Session::flash('sukses', 'Data Berhasil Ditambah');
        return redirect('produk');
    }

    
    public function edit($id)
    {
        $title="Edit Produk";
        $supplier = Supplier::get(); 
        $data=Produk::find($id);

        return view('produk.edit', compact('title', 'supplier','data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'supplier'=>'required',
            'nama'=>'required',
            'kode'=>'required',
            'stock'=>'required',
            'minimal_stock'=>'required',
            'harga'=>'required',
        ]);

        $data=$request->except(['_token','_method']);
        $data['updated_at'] = date("Y-m-d H:i:s");

        Produk::where('id', $id)->update($data);
        \Session::flash('sukses', 'Data Berhasil Diupdate');
        return redirect('produk');
    }

    public function delete($id){
        try{
            Produk::where('id', $id)->delete();

            \Session::flash('sukses'. 'Data Berhasil Dihapus');
        }
        catch (Exception $e){
            \Session::flash('gagal'.$e->getMessage());
        }

        return redirect('produk');
    }

    public function detail($id){
        $title='Detail Produk';

        $data=Produk::find($id);
        return view('produk.detail', compact('title','data'));
    }
}
