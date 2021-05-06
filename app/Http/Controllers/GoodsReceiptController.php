<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GoodsReceipt;
use App\Models\PurchaseOrders;
use App\Models\PurchaseOrdersLine;
use App\Models\Produk;

class GoodsReceiptController extends Controller
{
    public function index(){
        $title='List Goods Receipt';
        $data=GoodsReceipt::orderBy('created_at','desc')->get();

        return view('gr.index',compact('title','data'));
    }

    public function detail($id){
        $dt=GoodsReceipt::find($id);
        $title="Detail Good Receipt $dt->document_number";

        return view('gr.detail',compact('title','dt'));
    }

    public function approved($id){
        try{
            $data=GoodsReceipt::find($id);

            \DB::transaction(function() use($id, $data){
                GoodsReceipt::where('id',$id)->update([
                    'status'=>2,
                ]);
    
                foreach($data->purchase_orders->lines as $ln){
                    $qty=$ln->qty;
                    $produk=$ln->produk;
                    $pd=Produk::find($produk);
    
                    $stock_sekarang=$pd->stock;
                    $stock_baru=$stock_sekarang+$qty;
    
                    Produk::where('id',$produk)->update([
                        'stock'=>$stock_baru,
                    ]);
                }
            });

            \Session::flash('Sukses','Data Berhasil di Approve, Stock Otomatis Bertambah!');

        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());

        }
        return redirect()->back();
    }
}
