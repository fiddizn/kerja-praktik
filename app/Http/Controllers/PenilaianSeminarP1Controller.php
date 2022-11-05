<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarP1Controller extends Controller
{
    public function index()
    {
        $listPenilaianSeminar = PenilaianSeminar::with('mahasiswa')->where('pembimbing1_id', auth()->user()->pembimbing1->id)->filter(request('search'))->paginate(7)->withQueryString();
        return view('dosen.pembimbing.penilaian-seminar', [
            'title' => 'Penilaian Seminar',
            'role' => 'Pembimbing 1',
            'mahasiswas' => $listPenilaianSeminar
        ]);
    }

    public function show($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->p1_materi != null) {
            return view('dosen.pembimbing.p1detail-penilaian-seminar', [
                'title' => 'Detail Penilaian Seminar',
                'role' => 'Pembimbing 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return redirect()->intended('/dosen/pembimbing-1/penilaian-seminar/' . $penilaianseminar->id . '/edit');
        }
    }

    public function edit($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->p1_materi != null) {
            return view('dosen.pembimbing.p1isian-penilaian-seminar', [
                'title' => 'Edit Penilaian Seminar',
                'role' => 'Pembimbing 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return view('dosen.pembimbing.p1create-penilaian-seminar', [
                'title' => 'Form Penilaian Seminar',
                'role' => 'Pembimbing 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $file = request()->validate([
            'p1_file' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('p1_file')) {
            $file['p1_file'] = request()->file('p1_file')->store('penilaian_seminar_p1_file');
        } else $file['p1_file'] = null;
        $exist = PenilaianSeminar::find($id)->first()->p1_materi;
        PenilaianSeminar::with('mahasiswa')->find($id)->update([
            'p1_materi' => $request['p1_materi'],
            'p1_pemahaman' => $request['p1_pemahaman'],
            'p1_pencapaian' => $request['p1_pencapaian'],
            'p1_kedisiplinan' => $request['p1_kedisiplinan'],
            "p1_presentasi" => $request['p1_presentasi'],
            "p1_dokumentasi" => $request['p1_dokumentasi'],
            "p1_rumusanMasalah" => $request['p1_rumusanMasalah'],
            "p1_metodeDanPustaka" => $request['p1_metodeDanPustaka'],
            'p1_catatan' => $request['p1_catatan'],
            'p1_file' => $file['p1_file']
        ]);
        if (isset($exist)) {
            return redirect()->intended('/dosen/pembimbing-1/penilaian-seminar')->with('success', 'Penilaian telah diperbarui!');
        } else {
            return redirect()->intended('/dosen/pembimbing-1/penilaian-seminar')->with('success', 'Penilaian telah ditambahkan!');
        }
    }

    public function downloadFile($id)
    {
        $data = PenilaianSeminar::find($id);
        $filepath = public_path("storage/{$data->p1_file}");
        return response()->download($filepath);
    }
}