<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesLine extends Model
{
    protected $table='sales_line';

    public function produks(){
        return $this->belongsTo('App\Models\Produk','produk');
    }
}
