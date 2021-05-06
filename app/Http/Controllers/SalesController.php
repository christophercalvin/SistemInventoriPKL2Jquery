<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sales;
use App\Models\SalesLine;
use App\Models\Produk;

class SalesController extends Controller
{
    public function index(){
        $title='Histori Pengambilan Barang';
        $data=Sales::orderBy('created_at','desc')->get();

        $awal=date('Y-m-d',strtotime('-1 days'));
        $akhir=date('Y-m-d');

        return view ('sales.index', compact('title','data','awal','akhir'));
    }

    public function filter(Request $request){
        $awal=date('Y-m-d',strtotime($request->awal));
        $akhir=date('Y-m-d',strtotime($request->akhir));
    
        $title="Histori Pengambilan Barang Tanggal $awal sampai $akhir";

        $data=Sales::whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->orderBy('created_at','desc')->get();

        return view ('sales.index', compact('title','data','awal','akhir'));
    }

    public function detail($id){
        $data=Sales::find($id);
        $title="Detail Pengeluaran Barang $data->no_struk";


        return view('sales.detail',compact('title','data'));
    }
}
