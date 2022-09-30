<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>  fake()->unique()->numberBetween(1, 10),
            'nim' => fake()->unique()->numberBetween(3411191000, 3411191999),
            'name' => fake()->name()
            // 'p1_id' => fake()->numberBetween(1, 50),
            // 'p2_id' => fake()->numberBetween(1, 50),
            // 'r1_id' => fake()->numberBetween(1, 50),
            // 'r2_id' => fake()->numberBetween(1, 50),
            // 'hasil_review_id' => fake()->unique()->numberBetween(1, 50),
            // 'form_bimbingan_id' => fake()->unique()->numberBetween(1, 50),
            // 'pendaftaran_administrasi_id' => fake()->unique()->numberBetween(1, 50),
            // 'pendaftaran_seminar_id' => fake()->unique()->numberBetween(1, 50),
        ];
    }
}