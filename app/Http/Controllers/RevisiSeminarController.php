<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisiSeminarController extends Controller
{
    public function index()
    {
        return view('mahasiswa.revisi-seminar', [
            'title' => 'Revisi Seminar',
            'role' => 'Mahasiswa',
            'penilaianseminar' => auth()->user()->penilaianseminar
        ]);
    }

    public function downloadFileR1()
    {
        $data = auth()->user()->penilaianseminar->r1_file;
        $filepath = public_path("storage/{$data}");
        return response()->download($filepath);
    }

    public function downloadFileR2()
    {
        $data = auth()->user()->penilaianseminar->r2_file;
        $filepath = public_path("storage/{$data}");
        return response()->download($filepath);
    }
}