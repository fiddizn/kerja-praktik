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
        Schema::create('penilaian_seminars', function (Blueprint $table) {
            $table->id();
            $table->integer('mahasiswa_id');
            $table->integer('pembimbing1_id');
            $table->integer('pembimbing2_id');
            $table->integer('reviewer1_id');
            $table->integer('reviewer2_id');
            $table->integer('p1_materi')->nullable();
            $table->integer('p1_pemahaman')->nullable();
            $table->integer('p1_pencapaian')->nullable();
            $table->integer('p1_kedisiplinan')->nullable();
            $table->integer('p1_presentasi')->nullable();
            $table->integer('p1_dokumentasi')->nullable();
            $table->integer('p1_rumusanMasalah')->nullable();
            $table->integer('p1_metodeDanPustaka')->nullable();
            $table->string('p1_catatan')->nullable();
            $table->string('p1_file')->nullable();
            $table->integer('p2_materi')->nullable();
            $table->integer('p2_pemahaman')->nullable();
            $table->integer('p2_pencapaian')->nullable();
            $table->integer('p2_kedisiplinan')->nullable();
            $table->integer('p2_presentasi')->nullable();
            $table->integer('p2_dokumentasi')->nullable();
            $table->integer('p2_rumusanMasalah')->nullable();
            $table->integer('p2_metodeDanPustaka')->nullable();
            $table->string('p2_catatan')->nullable();
            $table->string('p2_file')->nullable();
            $table->integer('r1_presentasi')->nullable();
            $table->integer('r1_dokumentasi')->nullable();
            $table->integer('r1_rumusanMasalah')->nullable();
            $table->integer('r1_metodeDanPustaka')->nullable();
            $table->string('r1_catatan')->nullable();
            $table->string('r1_file')->nullable();
            $table->integer('r2_presentasi')->nullable();
            $table->integer('r2_dokumentasi')->nullable();
            $table->integer('r2_rumusanMasalah')->nullable();
            $table->integer('r2_metodeDanPustaka')->nullable();
            $table->string('r2_catatan')->nullable();
            $table->string('r2_file')->nullable();
            $table->string('status')->default(0);
            $table->string('rilis')->default(0);
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
        Schema::dropIfExists('penilaian_seminars');
    }
};