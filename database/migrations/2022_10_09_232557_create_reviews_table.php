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
            $table->integer('r1_id')->nullable();
            $table->string('reviewed_proposal')->nullable();
            $table->integer('penilaian1')->nullable();
            $table->integer('penilaian2')->nullable();
            $table->integer('penilaian3')->nullable();
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