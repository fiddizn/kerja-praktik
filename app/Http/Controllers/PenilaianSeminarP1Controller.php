<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarP1Controller extends Controller
{
    public function index()
    {
        $listPenilaianSeminar = PenilaianSeminar::with('mahasiswa')->where('pembimbing1_id', auth()->user()->pembimbing1->id)->paginate(7);
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

        PenilaianSeminar::with('mahasiswa')->find($id)->update([
            'p1_materi' => $request['p1_materi'],
            'p1_pemahaman' => $request['p1_pemahaman'],
            'p1_pencapaian' => $request['p1_pencapaian'],
            'p1_kedisiplinan' => $request['p1_kedisiplinan'],
            'p1_catatan' => $request['p1_catatan'],
            'p1_file' => $file['p1_file']
        ]);

        return redirect()->intended('/dosen/pembimbing-1/penilaian-seminar')->with('success', 'Penilaian telah ditambahkan!');
    }

    public function downloadFile($id)
    {
        $data = PenilaianSeminar::find($id);
        $filepath = public_path("storage/{$data->p1_file}");
        return response()->download($filepath);
    }
}