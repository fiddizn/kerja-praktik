<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendaftaranSeminar>
 */
class PendaftaranSeminarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Informasi Diri Mahasiswa
            'mahasiswa_id' => fake()->unique()->numberBetween(1, 100),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTime(),
            'gender' => fake()->titleMale(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'peminatan' => fake()->jobTitle(),
            'angkatan' => fake()->numberBetween(2016, 2019),

            // Informasi Nilai Mahasiswa
            'ipk' => 2.5,
            'jumlah_sks' => mt_rand(100, 140),
            'jumlah_teori_d' => mt_rand(0, 3),
            'jumlah_prak_d' => mt_rand(0, 3),
            'jumlah_e' => mt_rand(0, 3),
            'algo' => 'C',
            'strukdat' => 'D',
            'basdat' => 'E',
            'rpl' => 'AB',
            'metpen' => 'AB',
            'pemweb' => 'Sudah Selesai',
            'prak_pemweb' => 'Sedang diambil',
            'po1' => 'Belum diambil',
            'prak_po1' => 'Belum diambil',
            'appl' => 'Sedang diambil',
            'tagihan_uang' => fake()->mimeType(),
            'lunas_pembayaran' => fake()->mimeType(),
            'khs' => fake()->mimeType(),
            'judul_ta1' => fake()->sentence(10),
            'berkas_ta1' => fake()->mimeType()
        ];
    }
}