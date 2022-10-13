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
        Schema::create('list_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->integer('bimbingan_id');
            $table->dateTime('waktu');
            $table->string('pokok_materi');
            $table->string('pembahasan');
            $table->boolean('is_p1');
            $table->boolean('setuju');
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
        Schema::dropIfExists('list_bimbingans');
    }
};