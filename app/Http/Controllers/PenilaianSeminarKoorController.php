<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\persentasepenilaian;
use App\Models\PendaftaranSeminar;
use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarKoorController extends Controller
{
    public function index(Request $request)
    {
        $list_mahasiswa = PenilaianSeminar::where('p1_materi', '!=', null)
            ->where('p2_materi', '!=', null)
            ->where('r1_presentasi', '!=', null)
            ->where('r2_presentasi', '!=', null)
            ->filter(request('search'));
        if ($request->sortBy) {
            $list_mahasiswa = $list_mahasiswa->orderBy(Mahasiswa::select($request->sortBy)->whereColumn('mahasiswas.id', 'penilaian_seminars.mahasiswa_id'), $request->sortAsc);
        }
        $list_mahasiswa = $list_mahasiswa->paginate(7)->withQueryString();

        return view('koordinator.penilaian-seminar-index', [
            'title' => 'Penilaian Seminar',
            'role' => 'Koordinator',
            'penilaianseminars' => $list_mahasiswa,
            'sortBy' => $request->sortBy,
            'sortAsc' => $request->sortAsc,
            'search' => $request->search
        ]);
    }
    public function show($id)
    {
        $administrasi = persentasepenilaian::first()->administrasi;
        $bimbingan = persentasepenilaian::first()->bimbingan;
        $pembimbing = persentasepenilaian::first()->pembimbing;
        $penguji = persentasepenilaian::first()->penguji;
        $mahasiswa_id = PenilaianSeminar::with('mahasiswa', 'pembimbing1', 'pembimbing2', 'reviewer1', 'reviewer2')->where('id', $id)->first()->mahasiswa->id;
        return view('koordinator.penilaian-seminar-show', [
            'title' => 'Detail Mahasiswa',
            'role' => 'Koordinator',
            'penilaianseminar' => PenilaianSeminar::with('mahasiswa', 'pembimbing1', 'pembimbing2', 'reviewer1', 'reviewer2')->where('id', $id)->first(),
            'nilaiAdm' => Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->first()->penilaian,
            'bimbingan' => $bimbingan,
            'administrasi' => $administrasi,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
        ]);
    }

    public function setRilis($id)
    {
        PenilaianSeminar::where('id', $id)->first()->update([
            'rilis' => 1
        ]);
        return redirect()->back()->with('success', 'Penilaian seminar sukses dirilis!');
    }

    public function resetRilis($id)
    {
        PenilaianSeminar::where('id', $id)->first()->update([
            'rilis' => 0
        ]);
        return redirect()->back()->with('success', 'Penilaian seminar telah ditarik!');
    }

    public function setRilisBeberapa(Request $request)
    {
        if (!isset($request['checked'])) {
            return redirect()->back()->with('gagal', 'Anda belum memilih penilaian seminar yang akan dirilis!');
        } else {
            foreach ($request['checked'] as $item) {
                $review = PenilaianSeminar::find($item);
                $review->update([
                    'rilis' => 1
                ]);
            }
            return redirect()->intended('/koordinator/penilaian-seminar')->with('success', 'Penilaian Seminar telah dirilis!');
        }
        return redirect()->back()->with('success', 'Penilaian seminar sukses dirilis!');
    }

    public function showPersentase()
    {
        $administrasi = persentasepenilaian::first()->administrasi;
        $bimbingan = persentasepenilaian::first()->bimbingan;
        $pembimbing = persentasepenilaian::first()->pembimbing;
        $penguji = persentasepenilaian::first()->penguji;
        return view('koordinator.persentase', [
            'title' => 'Persentase Penilaian',
            'role' => 'Koordinator',
            'bimbingan' => $bimbingan,
            'administrasi' => $administrasi,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
        ]);
    }

    public function editPersentase()
    {
        $administrasi = persentasepenilaian::first()->administrasi;
        $bimbingan = persentasepenilaian::first()->bimbingan;
        $pembimbing = persentasepenilaian::first()->pembimbing;
        $penguji = persentasepenilaian::first()->penguji;
        return view('koordinator.edit-persentase', [
            'title' => 'Edit Persentase Penilaian',
            'role' => 'Koordinator',
            'bimbingan' => $bimbingan,
            'administrasi' => $administrasi,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
        ]);
    }

    public function updatePersentase(Request $request)
    {
        persentasepenilaian::find(1)->update([
            'bimbingan' => $request->bimbingan,
            'administrasi' => $request->administrasi,
            'pembimbing' => $request->pembimbing,
            'penguji' => $request->penguji
        ]);
        return redirect('/koordinator/penilaian-seminar/persentase-penilaian')->with('success', 'Persentase penilaian berhasil diperbarui!');
    }
}