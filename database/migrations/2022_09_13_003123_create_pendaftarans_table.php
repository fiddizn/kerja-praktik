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
        Schema::create('pendaftarans', function (Blueprint $table) {

            // Informasi Diri Mahasiswa
            $table->id();
            $table->foreignId('mahasiswa_id');
            $table->bigInteger('nim');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('address');
            $table->string('peminatan');
            $table->integer('angkatan');
            $table->timestamps();

            // Informasi Nilai Mahasiswa
            $table->float('ipk');
            $table->integer('jumlah_sks');
            $table->integer('jumlah_teori_d');
            $table->integer('jumlah_prak_d');
            $table->integer('jumlah_e');
            $table->string('algo');
            $table->string('strukdat');
            $table->string('basdat');
            $table->string('rpl');
            $table->string('metpen');
            $table->string('pemweb');
            $table->string('prak_pemweb');
            $table->string('po1');
            $table->string('prak_po1');
            $table->string('appl');
            $table->string('tagihan_uang');
            $table->string('lunas_pembayaran');
            $table->string('judul_ta1');
            $table->string('berkas_ta1');

            // Ajuan Dosen
            $table->string('alt1_p1');
            $table->string('alt1_p2');
            $table->string('alt2_p1');
            $table->string('alt2_p2');
            $table->string('alt3_p1');
            $table->string('alt3_p2');
            $table->string('alt4_p1');
            $table->string('alt4_p2');

            // status pendaftaran
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
};