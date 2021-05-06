<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenanggungJawab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penanggung_jawab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',115);
            $table->string('no_telp',20);
            $table->text('alamat');
            $table->string('email',115);
            $table->timestamps();

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
        Schema::table('penanggung_jawab', function (Blueprint $table) {
            //
        });
    }
}
