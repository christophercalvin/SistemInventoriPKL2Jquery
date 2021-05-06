<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Produk;
use App\Models\PurchaseOrdersLine;
use App\Models\PurchaseOrders;
use App\Models\M_status;
use App\Models\GoodsReceipt;
use App\Models\PenanggungJawab;
use PDF;

class PurchaseOrdersController extends Controller
{
    public function index(){
        $title="List Pre Order";
        $data=PurchaseOrders::withCount('lines')->orderBy('created_at','desc')->get();

        return view('po.index',compact('title','data'));
    }

    public function add(){
        $title = "Tambah Pre-Order Barang";
        $docno='PO-'.rand();
        $supplier=Supplier::orderBy('nama','asc')->get();
        return view('po.tambah', compact('title','docno','supplier'));
    }

    public function store (Request $request){
        try{
            $produk=$request->produk;
            $qty=$request->qty;

            $document_number=$request->document_number;
            $supplier=$request->supplier;

            $id_po=PurchaseOrders::insertGetId([
                'document_number'=>$document_number,
                'supplier'=>$supplier,
                'status'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

            foreach ($qty as $e=> $qt){
                if ($qt==0){
                    continue;
                }

                $dt_produk=Produk::where('id',$produk[$e])->first();
                $buy=$dt_produk->harga;
                $grand_total=$qt*$buy;
                PurchaseOrdersLine::insert([
                    'purchase_order'=>$id_po,
                    'produk'=>$produk[$e],
                    'qty'=>$qt,
                    'buy'=>$buy,
                    'grand_total'=>$grand_total
                ]);
            }
            \Session::flash('sukses','PO Berhasil Dibuat!');
            return redirect ('/purchase_order');
        }
        catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function get_produk($id_supplier){
        $title = "Tambah Pre-Order Barang";
        $docno='PO-'.rand();
        $supplier=Supplier::orderBy('nama','asc')->get();
        $produk=Produk::where('supplier',$id_supplier)->get();

        return view('po.tambah', compact('title','docno','supplier','produk','id_supplier'));
    }

    public function approved($id){
        try{
            $po=PurchaseOrders::find($id);
            PurchaseOrders::where('id',$id)->update([
                'status'=>2,
            ]);

            GoodsReceipt::where('purchase_order',$id)->delete();

            GoodsReceipt::insert([
                'purchase_order'=>$id,
                'document_number'=>'GR-'.rand(),
                'status'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);

            \Session::flash('sukses','Data PO Berhasil di Setujui!');
        }catch (\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function detail ($id){
        $data=PurchaseOrders::find($id);
        $title="Detail Pre Order $data->document_number";

        return view ('po.detail',compact('title','data'));
    }

    public function hapus_line($id){
        try{
            PurchaseOrdersLine::where('id',$id)->delete();
            \Session::flash("Sukses", "Data Berhasil Dihapus");

        }catch(\Exception $e){
            \Session::flash("Gagal", $e->getMessage());
        }

        return redirect()->back();
    }

    public function update(Request $request, $id){
        try{
            $qty=$request->qty;
            $id_line=$request->id_line;
            $buy=$request->buy;
            $produk=$request->produk;

            foreach($qty as $e =>$dt){
                $data['qty']=$dt;
                $data['buy']=$buy[$e];
                $line=$id_line[$e];
                $data['grand_total']=$dt*$buy[$e];

                PurchaseOrdersLine::where('id',$line)->update($data);

                Produk::where('id',$produk[$e])->update(['harga'=>$data['buy']]);
            }
            \Session::flash('sukses','Data Berhasil Diubah!');
        }catch(\Exception $e){
            \Session::flash('Gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function pdf($id){
        try {
            $dt = PurchaseOrders::with('suppliers')->find($id);
            $pj=PenanggungJawab::first();
 
            $pdf = PDF::loadview('po.pdf',compact('dt','pj'))->setPaper('a4', 'potrait');
            return $pdf->stream();
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }
 
        return redirect()->back();
    }
}
