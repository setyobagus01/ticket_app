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
        Schema::table('pemesanan_tiket', function (Blueprint $table) {
            $table->foreign('paket_id','fk_pemesanan_tiket_to_paket')->references('id')->on('paket')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan_tiket', function (Blueprint $table) {
            $table->dropForeign('fk_pemesanan_tiket_to_paket');
        });
    }
};
