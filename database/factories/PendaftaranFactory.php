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
            'nim' => fake()->numberBetween(91000, 91999),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTime(),
            'gender' => fake()->titleMale(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'peminatan' => fake()->jobTitle(),
            'angkatan' => fake()->numberBetween(2017, 2019)
        ];
    }
}
