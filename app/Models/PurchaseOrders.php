<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends Model
{
    protected $table = 'purchase_orders';


    public function suppliers(){
        return $this->belongsTo('App\Models\Supplier','supplier');
    }

    public function statuses(){
        return $this->belongsTo('App\Models\M_status','status');
    }

    public function lines(){
        return $this->hasMany('App\Models\PurchaseOrdersLine','purchase_order');
    }

    public function grand_total(){
       $po=$this->id;

       $total=PurchaseOrdersLine::where('purchase_order', $po)->sum('grand_total');

       return $total;
    }
}
