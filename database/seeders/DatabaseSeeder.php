<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jabfung;
use App\Models\Mahasiswa;
use App\Models\Reviewer1;
use App\Models\Reviewer2;
use App\Models\Koordinator;
use App\Models\KunciPendaftaran;
use App\Models\Pembimbing1;
use App\Models\Pembimbing2;
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
        // Mahasiswa::factory(5)->create();
        // Pendaftaran::factory(5)->create();
        // User::factory(50)->create();

        Role::create([
            'name' => 'Mahasiswa',
            'redirect_to' => '/mahasiswa',
        ]);
        Role::create([
            'name' => 'Koordinator',
            'redirect_to' => '/koordinator',
        ]);
        Role::create([
            'name' => 'Dosen',
            'redirect_to' => '/dosen',
        ]);
        Role::create([
            'name' => 'Admin',
            'redirect_to' => '/admin',
        ]);
        Role::create([
            'name' => 'TU',
            'redirect_to' => '/tu',
        ]);

        Jabfung::create([
            'name' => 'Non Jabfung'
        ]);

        Jabfung::create([
            'name' => 'Asisten Ahli'
        ]);

        Jabfung::create([
            'name' => 'Lektor'
        ]);

        Jabfung::create([
            'name' => 'Lektor Kepala'
        ]);

        Jabfung::create([
            'name' => 'Guru Besar'
        ]);

        KunciPendaftaran::create([
            'administrasi' => 1,
            'seminar' => 1
        ]);
    }
}