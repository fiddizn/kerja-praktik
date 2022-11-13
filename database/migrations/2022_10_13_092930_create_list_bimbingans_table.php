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
            $table->string('waktu');
            $table->string('pokok_materi');
            $table->text('pembahasan');
            $table->boolean('is_p1')->nullable();
            $table->boolean('setuju')->nullable();
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