<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table='produks';

    public function supplier_r(){
        return $this->belongsTo('App\Models\Supplier', 'supplier','id');
    }
}
