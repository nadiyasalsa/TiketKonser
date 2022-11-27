<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tikets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_konser');
            $table->string('jenis_tiket');
            $table->string('email');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('harga_tiket');
            $table->string('jumlah_tiket');
            $table->string('total');
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
        Schema::dropIfExists('order_tikets');
    }
}
