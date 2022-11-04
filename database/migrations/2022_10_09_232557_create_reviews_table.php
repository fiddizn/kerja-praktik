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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('mahasiswa_id');
            $table->integer('pendaftaran_id');
            $table->integer('p1_id')->nullable();
            $table->integer('r1_id')->nullable();

            $table->integer('p1_penilaian1')->nullable();
            $table->integer('p1_penilaian2')->nullable();
            $table->integer('p1_penilaian3')->nullable();
            $table->integer('p1_penilaian4')->nullable();
            $table->integer('p1_penilaian5')->nullable();
            $table->integer('p1_penilaian6')->nullable();
            $table->String('p1_hasil_review')->nullable();
            $table->String('p1_komentar')->nullable();
            $table->String('p1_proposal')->nullable();
            $table->boolean('p1_status')->default(0);

            $table->integer('r1_penilaian1')->nullable();
            $table->integer('r1_penilaian2')->nullable();
            $table->integer('r1_penilaian3')->nullable();
            $table->integer('r1_penilaian4')->nullable();
            $table->integer('r1_penilaian5')->nullable();
            $table->integer('r1_penilaian6')->nullable();
            $table->String('r1_hasil_review')->nullable();
            $table->String('r1_komentar')->nullable();
            $table->String('r1_proposal')->nullable();
            $table->boolean('r1_status')->default(0);

            $table->boolean('rilis')->default(0);
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
        Schema::dropIfExists('reviews');
    }
};