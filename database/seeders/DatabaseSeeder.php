<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Koordinator;
use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Pendaftaran::factory(15)->create();
        User::factory(20)->create();

        Role::create([
            'name' => 'Mahasiswa',
            'redirect_to' => '/mahasiswa',
        ]);
        Role::create([
            'name' => 'Koordinator',
            'redirect_to' => '/koordinator',
        ]);
        Role::create([
            'name' => 'Pembimbing 1',
            'redirect_to' => '/dosen',
        ]);
        Role::create([
            'name' => 'Pembimbing 2',
            'redirect_to' => '/dosen',
        ]);
        Role::create([
            'name' => 'Penguji 1',
            'redirect_to' => '/dosen',
        ]);
        Role::create([
            'name' => 'Penguji 2',
            'redirect_to' => '/dosen',
        ]);
    }
}