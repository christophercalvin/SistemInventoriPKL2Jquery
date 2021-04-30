<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier')->unsigned();
            $table->string('nama',255);
            $table->string('kode',40);
            $table->integer('stock');
            $table->integer('minimal_stock');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('supplier')->references('id')->on('suppliers')->onDelete('restrict');
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
        Schema::dropIfExists('table_produk');
    }
}
