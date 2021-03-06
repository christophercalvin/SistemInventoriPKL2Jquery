<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order')->unsigned();
            $table->integer('produk')->unsigned();
            $table->integer('buy');
            $table->integer('qty');
            $table->integer('grand_total');
            
            $table->foreign('purchase_order')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->foreign('produk')->references('id')->on('produks')->onDelete('cascade');

            $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_line', function (Blueprint $table) {
            //
        });
    }
}
