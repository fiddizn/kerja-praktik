<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarKoorController extends Controller
{
    public function index()
    {
        return view('koordinator.penilaian-seminar-index', [
            'title' => 'Penilaian Seminar',
            'role' => 'Koordinator',
            'penilaianseminars' => PenilaianSeminar::where('p1_materi', '!=', null)
                ->where('p2_materi', '!=', null)
                ->where('r1_presentasi', '!=', null)
                ->where('r2_presentasi', '!=', null)
                ->oldest()->paginate(7)
        ]);
    }
    public function show($id)
    {
        return view('koordinator.penilaian-seminar-show', [
            'title' => 'Penilaian Seminar',
            'role' => 'Koordinator',
            'penilaianseminar' => PenilaianSeminar::with('mahasiswa', 'pembimbing1', 'pembimbing2', 'reviewer1', 'reviewer2')->where('id', $id)->first()
        ]);
    }

    public function setRilis($id)
    {
        PenilaianSeminar::where('id', $id)->first()->update([
            'rilis' => request('rilis')
        ]);
        if (request('rilis') != 0) {
            return redirect()->back()->with('success', 'Penilaian sukses dirilis!');
        } else {
            return redirect()->back()->with('success', 'Penilaian ditarik!');
        }
    }
}