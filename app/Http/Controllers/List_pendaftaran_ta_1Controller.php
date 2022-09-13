<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class List_pendaftaran_ta_1Controller extends Controller
{
    public function index()
    {
        return view('list-pendaftaran-ta-1', [
            'title' => 'Home',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            "pendaftarans" => Pendaftaran::all()
        ]);
    }
}