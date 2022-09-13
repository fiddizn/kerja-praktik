<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Koordinator;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::factory(10)->create();
        Koordinator::factory(1)->create();
        Pendaftaran::factory(10)->create();
    }
}
