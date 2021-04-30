<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\PurchaseOrdersLine;

class GoodsReceipt extends Model
{
    protected $table='goods_receipt';

    public function statuss(){
        return $this->belongsTo('App\Models\M_status','status');
    }

    public function purchase_orders(){
        return $this->belongsTo('App\Models\PurchaseOrders','purchase_order');
    }

    public function total_item(){
        $id_po=$this->purchase_order;
        $total=PurchaseOrdersLine::where('purchase_order',$id_po)->count();

        return $total;
    }

    public function grand_total(){
        $id_po=$this->purchase_order;
 
        $total=PurchaseOrdersLine::where('purchase_order', $id_po)->sum('grand_total');
 
        return $total;
     }
}
