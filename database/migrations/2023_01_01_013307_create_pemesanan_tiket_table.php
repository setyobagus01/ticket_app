<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_tiket', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('buyer_name');
            $table->foreignId('paket_id')->index('fk_pemesanan_tiket_to_paket');
            $table->integer('jumlah_pemesanan');
            $table->integer('down_payment');
            $table->integer('additional_cost');
            $table->integer('total');
            $table->boolean('is_pay');
            $table->timestamp('expired_date');
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
        Schema::dropIfExists('pemesanan_tiket');
    }
};
