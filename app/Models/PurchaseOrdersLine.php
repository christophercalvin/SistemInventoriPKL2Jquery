<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrdersLine extends Model
{
    protected $table='purchase_order_line';
    public $timestamps=false;

    public function produks(){
        return $this->belongsTo('App\Models\Produk','produk');
    }

    public function sum_buy(){
        return $this->where('purchase_order',$this->purchase_order)->sum('buy');
    }

    public function sum_grand_total(){
        return $this->where('purchase_order',$this->purchase_order)->sum('grand_total');
    }
}
