<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan_iklans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iklan_id')->unsigned();
            $table->foreign('iklan_id')->references('id')->on('iklans')->onDelete('cascade');
            $table->integer('pelapor_id');
            $table->text('alasan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaporan_iklans');
    }
}
