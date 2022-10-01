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
        Mahasiswa::factory(10)->create();
        Koordinator::factory(1)->create();
        Pendaftaran::factory(5)->create();
        User::factory(10)->create();

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
            'redirect_to' => '/pembimbing1-1',
        ]);
        Role::create([
            'name' => 'Pembimbing 2',
            'redirect_to' => '/pembimbing1-2',
        ]);
        Role::create([
            'name' => 'Penguji 1',
            'redirect_to' => '/reviewer-1',
        ]);
        Role::create([
            'name' => 'Penguji 2',
            'redirect_to' => '/reviewer-2',
        ]);
        Role::create([
            'name' => 'Admin',
            'redirect_to' => '/admin',
        ]);
        Role::create([
            'name' => 'TU',
            'redirect_to' => '/tu',
        ]);
    }
}