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
        Schema::table('stok_opname', function (Blueprint $table) {
            $table->foreign('produk_id', 'fk_stok_opname_to_produk')->references('id')->on('produk')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stok_opname', function (Blueprint $table) {
            $table->dropForeign('fk_stok_opname_to_produk');
        });
    }
};
