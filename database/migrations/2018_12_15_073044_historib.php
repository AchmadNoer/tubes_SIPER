<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Historib extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historib', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_relawan')->nullable();
            $table->foreign('id_relawan')->references('id')->on('akun');
            $table->unsignedInteger('id_bencana')->nullable();
            $table->foreign('id_bencana')->references('id_bencana')->on('bencana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historib');
    }
}
