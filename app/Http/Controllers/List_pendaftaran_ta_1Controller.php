<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class List_pendaftaran_ta_1Controller extends Controller
{
    public function index()
    {
        return view(
            'k-list-pendaftaran-ta-1',
            [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Galang Setia Nugroho',
                'role' => 'Koordinator',
                'list_mahasiswa' => Pendaftaran::latest()->filter(request('search'))->paginate(7)->withQueryString()
            ]
        );
    }
}