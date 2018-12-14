<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Akun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('tempatlhr');
            $table->date('tanggallhr');
            $table->string('gender');
            $table->string('noHP',12)->unique();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('keahlian');
            $table->boolean('kompetensi')->default(FALSE);
            $table->boolean('status')->dafault(TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun');
    }
}
