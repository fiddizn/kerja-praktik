<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('pendaftaran-ta-1', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Fahmi Yusron Fiddin',
            'role' => 'Mahasiswa'
        ]);
    }
    public function store()
    {
        return request()->all();
    }
}