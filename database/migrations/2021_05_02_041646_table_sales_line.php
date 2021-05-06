<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSalesLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales')->unsigned();
            $table->integer('produk')->unsigned();
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('grand_total');

            $table->foreign('produk')->references('id')->on('produks')->onDelete('restrict');
            $table->foreign('sales')->references('id')->on('sales')->onDelete('cascade');
            $table->engine="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_line', function (Blueprint $table) {
            //
        });
    }
}
