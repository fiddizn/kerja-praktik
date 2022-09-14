<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class List_pendaftaran_ta_1Controller extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest();
        $pendaftarans = Pendaftaran::latest();
        if (request('search')) {
            $pendaftarans->where('nim', 'like', '%' . request('search') . '%')
                ->orWhere('peminatan', 'like', '%' . request('search') . '%')
                ->orWhere('judul_ta1', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%');
        }
        return view('list-pendaftaran-ta-1', [
            'title' => 'Home',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            "pendaftarans" => $pendaftarans->get()
        ]);
    }
}