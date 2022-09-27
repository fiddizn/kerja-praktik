<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Koordinator;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\User;
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
        Mahasiswa::factory(15)->create();
        Koordinator::factory(1)->create();
        Pendaftaran::factory(50)->create();
        User::factory(2)->create();
    }
}