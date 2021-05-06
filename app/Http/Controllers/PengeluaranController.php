<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Sales;
use App\Models\SalesLine;

class PengeluaranController extends Controller
{
    public function index(){
        $title='Data Pengeluaran/Pengambilan Barang';
        

        return view ('pengeluaran.index',compact('title'));
    }

    public function get_produk($nama){
        $dt=Produk::where('nama',$nama)->first();

        return response()->json([
            'data'=>$dt
        ]);
    }

    public function store(Request $request){
        try{

            $produk=$request->produk;
            $qty=$request->qty;
            $harga=$request->harga;

            \DB::transaction(function()use($produk, $qty, $harga){

                $header=Sales::insertGetId([
                    'no_struk'=>rand(),
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),

                ]);
                foreach($produk as $e =>$pd){
                    SalesLine::insert([
                        'sales'=>$header,
                        'produk'=>$pd,
                        'harga'=>$harga[$e],
                        'qty'=>$qty[$e],
                        'grand_total'=>(Int)$qty[$e] * (Int)$harga[$e],
                    ]);

                    $dt=Produk::find($pd);
                    $qty_now=$dt->stock;
                    $qty_new=$qty_now-$qty[$e];

                    Produk::where('id',$pd)->update([
                        'stock'=>$qty_new,
                    ]);
                }

                $sum_total=SalesLine::where('sales', $header)->sum('grand_total');
                Sales::where('id',$header)->update([
                    'grand_total'=>$sum_total,
                ]);
            });
            \Session::flash('sukses', 'Data Transaksi Berhasil di Rekam!');


        }
        catch(\Exception $e){
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

}
