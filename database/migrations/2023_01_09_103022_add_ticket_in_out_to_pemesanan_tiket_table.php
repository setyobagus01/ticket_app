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
            $table->timestamp('tiket_masuk')->nullable();
            $table->timestamp('tiket_keluar')->nullable();
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
            $table->dropColumn('tiket_masuk');
            $table->dropColumn('tiket_keluar');
        });
    }
};
