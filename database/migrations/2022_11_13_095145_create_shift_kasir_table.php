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
        Schema::create('shift_kasir', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_buka');
            $table->dateTime('waktu_tutup')->nullable();
            $table->integer('tunai_awal');
            $table->integer('tunai_akhir')->nullable();
            $table->enum('status', ['buka', 'tutup']);
            $table->longText('catatan')->nullable();
            $table->foreignId('users_id')->nullable()->index('fk_shift_kasir_to_users');
            $table->foreignId('shift_id')->nullable()->index('fk_shift_kasir_to_shift');
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
        Schema::dropIfExists('shift_kasir');
    }
};
