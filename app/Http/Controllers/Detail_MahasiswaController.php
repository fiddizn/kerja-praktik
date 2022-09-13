<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class Detail_MahasiswaController extends Controller
{
    public function index(Pendaftaran $pendaftaran_id)
    {
        return view('detail-mahasiswa', [
            'title' => 'Home',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'pendaftaran' => $pendaftaran_id
        ]);
    }
}