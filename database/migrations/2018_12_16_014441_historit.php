<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Historit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_relawan')->nullable();
            $table->foreign('id_relawan')->references('id')->on('akun');
            $table->unsignedInteger('id_training')->nullable();
            $table->foreign('id_training')->references('id_training')->on('training');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historit');
    }
}
