<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketKonsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_konsers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_konser');
            $table->string('guest_star');
            $table->string('jenis_tiket');
            $table->string('description');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('harga_tiket');
            $table->string('stok_tiket');
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
        Schema::dropIfExists('tiket_konsers');
    }
}
