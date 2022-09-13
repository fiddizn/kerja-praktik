<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mahasiswa_id' => mt_rand(1, 10),
            'nim' => fake()->numberBetween(3411191000, 3411191999),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTime(),
            'gender' => fake()->titleMale(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'peminatan' => fake()->jobTitle(),
            'angkatan' => fake()->numberBetween(2017, 2019),

            // Informasi Nilai Mahasiswa

            'ipk' => mt_rand(1, 4),
            'jumlah_sks' => mt_rand(100, 140),
            'jumlah_teori_d' => mt_rand(0, 3),
            'jumlah_prak_d' => mt_rand(0, 3),
            'jumlah_e' => mt_rand(0, 3),
            'algo' => 'A',
            'strukdat' => 'BC',
            'basdat' => 'B',
            'rpl' => 'AB',
            'metpen' => 'AB',
            'pemweb' => 'AB',
            'prak_pemweb' => 'AB',
            'po1' => 'A',
            'prak_po1' => 'B',
            'appl' => 'A',
            'tagihan_uang' => fake()->mimeType(),
            'lunas_pembayaran' => fake()->mimeType(),
            'judul_ta1' => fake()->sentence(10),
            'berkas_ta1' => fake()->mimeType(),

            // Ajuan Dosen

            'alt1_p1' => fake()->name(),
            'alt1_p2' => fake()->name(),
            'alt2_p1' => fake()->name(),
            'alt2_p2' => fake()->name(),
            'alt3_p1' => fake()->name(),
            'alt3_p2' => fake()->name(),
            'alt4_p1' => fake()->name(),
            'alt4_p2' => fake()->name(),

            // status
            'status' => ''
        ];
    }
}