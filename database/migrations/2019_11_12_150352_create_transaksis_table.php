<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')->unsigned();
            $table->foreign('id_pemilik')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_penyewa')->unsigned();
            $table->foreign('id_penyewa')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('pengambilan_barang');
            $table->string('pembayaran');
            $table->date('tanggal_sewa');
            $table->integer('harga_sewa');
            $table->integer('lama');
            $table->integer('total');
            $table->string('status');
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
        Schema::dropIfExists('transaksis');
    }
}
