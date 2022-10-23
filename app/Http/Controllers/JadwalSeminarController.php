<?php

namespace App\Http\Controllers;

use App\Models\JadwalSeminar;
use Illuminate\Http\Request;

class JadwalSeminarController extends Controller
{
    public function index()
    {
        return view('koordinator.jadwal-seminar', [
            'title' => 'Jadwal Seminar',
            'role' => 'Koordinator',
            'jadwal' => JadwalSeminar::first()
        ]);
    }

    public function store()
    {
        $file = request()->validate([
            'mahasiswa' => 'file|max:5120|mimes:doc,docx,pdf',
            'dosen' => 'file|max:5120|mimes:doc,docx,pdf'
        ]);

        if (request()->file('mahasiswa')) {
            $file['mahasiswa'] = request()->file('mahasiswa')->store('jadwal-seminar-mahasiswa');
        } else $file['mahasiswa'] = null;
        if (request()->file('dosen')) {
            $file['dosen'] = request()->file('dosen')->store('jadwal-seminar-dosen');
        } else $file['dosen'] = null;

        JadwalSeminar::create([
            'dosen' => $file['dosen'],
            'mahasiswa' => $file['mahasiswa']
        ]);
        return redirect()->back()->with('success', 'Jadwal telah diunggah!');
    }

    public function downloadJadwalMahasiswa()
    {
        $data = JadwalSeminar::first();
        $filepath = public_path("storage/{$data->mahasiswa}");
        return response()->download($filepath);
    }

    public function downloadJadwalDosen()
    {
        if (JadwalSeminar::first() != null) {
            $data = JadwalSeminar::first();
            $filepath = public_path("storage/{$data->dosen}");
            return response()->download($filepath);
        } else {
            return redirect()->back()->with('gagal', 'Maaf, Jadwal Seminar TA 1 belum tersedia!');
        }
    }

    public function update()
    {
        $file = request()->validate([
            'mahasiswa' => 'file|max:5120|mimes:doc,docx,pdf',
            'dosen' => 'file|max:5120|mimes:doc,docx,pdf'
        ]);

        if (request()->file('mahasiswa')) {
            $file['mahasiswa'] = request()->file('mahasiswa')->store('jadwal-seminar-mahasiswa');
        } else $file['mahasiswa'] = null;
        if (request()->file('dosen')) {
            $file['dosen'] = request()->file('dosen')->store('jadwal-seminar-dosen');
        } else $file['dosen'] = null;

        JadwalSeminar::first()->delete();

        JadwalSeminar::create([
            'dosen' => $file['dosen'],
            'mahasiswa' => $file['mahasiswa']
        ]);
        return redirect()->intended('/koordinator/jadwal-seminar')->with('success', 'Jadwal telah diperbarui!');
    }
}