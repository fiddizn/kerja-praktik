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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('nim');
            $table->string('name');
            $table->integer('p1_id')->nullable();
            $table->integer('p2_id')->nullable();
            $table->integer('r1_id')->nullable();
            $table->integer('r2_id')->nullable();
            $table->integer('hasil_review_id')->nullable();
            $table->integer('form_bimbingan_id')->nullable();
            $table->integer('pendaftaran_administrasi_id')->nullable();
            $table->integer('pendaftaran_seminar_id')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};