<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PenilaianSeminar;
use App\Models\persentasepenilaian;
use Illuminate\Http\Request;

class TUPenilaianSeminarController extends Controller
{
    public function index()
    {
        $administrasi = persentasepenilaian::first()->administrasi;
        $bimbingan = persentasepenilaian::first()->bimbingan;
        $pembimbing = persentasepenilaian::first()->pembimbing;
        $penguji = persentasepenilaian::first()->penguji;
        return view('tu.penilaian-seminar-index', [
            'title' => 'Penilaian Seminar',
            'role' => 'Tata Usaha',
            'penilaianseminars' => PenilaianSeminar::where('p1_materi', '!=', null)
                ->where('p2_materi', '!=', null)
                ->where('r1_presentasi', '!=', null)
                ->where('r2_presentasi', '!=', null)
                ->where('rilis', true)
                ->oldest()->filter(request('search'))->paginate(7)->withQueryString(),
            'bimbingan' => $bimbingan,
            'administrasi' => $administrasi,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
        ]);
    }
    public function show($id)
    {
        $administrasi = persentasepenilaian::first()->administrasi;
        $bimbingan = persentasepenilaian::first()->bimbingan;
        $pembimbing = persentasepenilaian::first()->pembimbing;
        $penguji = persentasepenilaian::first()->penguji;
        return view('tu.penilaian-seminar-show', [
            'title' => 'Penilaian Seminar',
            'role' => 'Tata Usaha',
            'penilaianseminar' => PenilaianSeminar::with('mahasiswa', 'pembimbing1', 'pembimbing2', 'reviewer1', 'reviewer2')->where('id', $id)->first(),
            'bimbingan' => $bimbingan,
            'administrasi' => $administrasi,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
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