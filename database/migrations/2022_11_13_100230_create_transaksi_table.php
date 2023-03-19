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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('pembeli');
            $table->integer('subtotal');
            $table->integer('diskon')->nullable();
            $table->integer('potongan')->nullable();
            $table->integer('total');
            $table->foreignId('users_id')->nullable()->index('fk_transaksi_to_users');
            $table->foreignId('metode_pembayaran_id')->nullable()->index('fk_transaksi_to_metode_pembayaran');
            $table->softDeletes();
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
        Schema::dropIfExists('transaksi');
    }
};
