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
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->foreign('transaksi_id', 'fk_detail_transaksi_to_transaksi')->references('id')->on('transaksi')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('produk_id', 'fk_detail_transaksi_to_produk')->references('id')->on('produk')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->dropForeign('fk_detail_transaksi_to_transaksi');
            $table->dropForeign('fk_detail_transaksi_to_produk');
        });
    }
};
