<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table){
            $table->id();
            $table->string('nama_pemesan');
            $table->string('tipe_kamar');
            $table->integer('harga');
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('check_in');
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
        //
    }
}
