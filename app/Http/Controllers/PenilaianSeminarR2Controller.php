<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarR2Controller extends Controller
{
    public function index()
    {
        $listPenilaianSeminar = PenilaianSeminar::with('mahasiswa')->where('reviewer2_id', auth()->user()->reviewer2->id)->filter(request('search'))->paginate(7)->withQueryString();
        return view('dosen.reviewer.penilaian-seminar', [
            'title' => 'Penilaian Seminar',
            'role' => 'Reviewer 2',
            'mahasiswas' => $listPenilaianSeminar
        ]);
    }

    public function show($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->r2_presentasi != null) {
            return view('dosen.reviewer.r2detail-penilaian-seminar', [
                'title' => 'Detail Penilaian Seminar',
                'role' => 'Reviewer 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return redirect()->intended('/dosen/reviewer-2/penilaian-seminar/' . $penilaianseminar->id . '/edit');
        }
    }

    public function edit($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->r2_presentasi != null) {
            return view('dosen.reviewer.r2isian-penilaian-seminar', [
                'title' => 'Edit Penilaian Seminar',
                'role' => 'Reviewer 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return view('dosen.reviewer.r2create-penilaian-seminar', [
                'title' => 'Form Penilaian Seminar',
                'role' => 'Reviewer 2',
                'penilaianSeminar' => $penilaianseminar
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $file = request()->validate([
            'r2_file' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('r2_file')) {
            $file['r2_file'] = request()->file('r2_file')->store('penilaian_seminar_r2_file');
        } else $file['r2_file'] = null;

        PenilaianSeminar::with('mahasiswa')->find($id)->update([
            'r2_presentasi' => $request['r2_presentasi'],
            'r2_dokumentasi' => $request['r2_dokumentasi'],
            'r2_rumusanMasalah' => $request['r2_rumusanMasalah'],
            'r2_metodeDanPustaka' => $request['r2_metodeDanPustaka'],
            'r2_catatan' => $request['r2_catatan'],
            'r2_file' => $file['r2_file']
        ]);

        return redirect()->intended('/dosen/reviewer-2/penilaian-seminar')->with('success', 'Penilaian telah ditambahkan!');
    }

    public function downloadFile($id)
    {
        $data = PenilaianSeminar::find($id);
        $filepath = public_path("storage/{$data->r2_file}");
        return response()->download($filepath);
    }
}