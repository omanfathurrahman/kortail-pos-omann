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
        Schema::table('shift_kasir', function (Blueprint $table) {
            $table->foreign('users_id', 'fk_shift_kasir_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('shift_id', 'fk_shift_kasir_to_shift')->references('id')->on('shift')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shift_kasir', function (Blueprint $table) {
            $table->dropForeign('fk_shift_kasir_to_users');
            $table->dropForeign('fk_shift_kasir_to_shift');
        });
    }
};
