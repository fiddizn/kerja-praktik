<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarP2Controller extends Controller
{
    public function index()
    {
        $listPenilaianSeminar = PenilaianSeminar::with('mahasiswa')->where('pembimbing2_id', auth()->user()->pembimbing2->id)->paginate(7);
        return view('dosen.pembimbing.penilaian-seminar', [
            'title' => 'Penilaian Seminar',
            'role' => 'Pembimbing 2',
            'mahasiswas' => $listPenilaianSeminar
        ]);
    }

    public function show($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->p2_materi != null) {
            return view('dosen.pembimbing.p2detail-penilaian-seminar', [
                'title' => 'Detail Penilaian Seminar',
                'role' => 'Pembimbing 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return redirect()->intended('/dosen/pembimbing-2/penilaian-seminar/' . $penilaianseminar->id . '/edit');
        }
    }

    public function edit($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->p2_materi != null) {
            return view('dosen.pembimbing.p2isian-penilaian-seminar', [
                'title' => 'Edit Penilaian Seminar',
                'role' => 'Pembimbing 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return view('dosen.pembimbing.p2create-penilaian-seminar', [
                'title' => 'Form Penilaian Seminar',
                'role' => 'Pembimbing 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $file = request()->validate([
            'p2_file' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('p2_file')) {
            $file['p2_file'] = request()->file('p2_file')->store('penilaian_seminar_p2_file');
        } else $file['p2_file'] = null;

        PenilaianSeminar::with('mahasiswa')->find($id)->update([
            'p2_materi' => $request['p2_materi'],
            'p2_pemahaman' => $request['p2_pemahaman'],
            'p2_pencapaian' => $request['p2_pencapaian'],
            'p2_kedisiplinan' => $request['p2_kedisiplinan'],
            'p2_catatan' => $request['p2_catatan'],
            'p2_file' => $file['p2_file']
        ]);

        return redirect()->intended('/dosen/pembimbing-2/penilaian-seminar')->with('success', 'Penilaian telah ditambahkan!');
    }

    public function downloadFile($id)
    {
        $data = PenilaianSeminar::find($id);
        $filepath = public_path("storage/{$data->p2_file}");
        return response()->download($filepath);
    }
}