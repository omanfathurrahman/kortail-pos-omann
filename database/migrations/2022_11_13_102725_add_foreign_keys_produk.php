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
        Schema::table('produk', function (Blueprint $table) {
            $table->foreign('kategori_id', 'fk_produk_to_kategori')->references('id')->on('kategori')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('merchant_id', 'fk_produk_to_merchant')->references('id')->on('merchant')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign('fk_produk_to_kategori');
            $table->dropForeign('fk_produk_to_merchant');
        });
    }
};
