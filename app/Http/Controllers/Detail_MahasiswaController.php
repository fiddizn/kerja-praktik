<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class Detail_MahasiswaController extends Controller
{
    public function index(Pendaftaran $pendaftaran_id)
    {
        return view('k-detail-mahasiswa', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'pendaftaran' => $pendaftaran_id
        ]);
    }

    public function show(Pendaftaran $pendaftaran_id, $status)
    {
        return view('k-catatan', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'status' => $status,
            'pendaftaran' => $pendaftaran_id
        ]);
    }
}