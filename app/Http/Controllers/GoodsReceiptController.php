<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GoodsReceipt;
use App\Models\PurchaseOrders;
use App\Models\PurchaseOrdersLine;

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
}
