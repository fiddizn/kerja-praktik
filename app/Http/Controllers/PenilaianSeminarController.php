<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class PenilaianSeminarController extends Controller
{
    public function index()
    {
        $listPenilaianSeminar = PenilaianSeminar::with('mahasiswa')->where('reviewer1_id', auth()->user()->reviewer1->id)->filter(request('search'))->paginate(7)->withQueryString();
        return view('dosen.reviewer.penilaian-seminar', [
            'title' => 'Penilaian Seminar',
            'role' => 'Reviewer 1',
            'mahasiswas' => $listPenilaianSeminar
        ]);
    }

    public function show($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->r1_presentasi != null) {
            return view('dosen.reviewer.detail-penilaian-seminar', [
                'title' => 'Detail Penilaian Seminar',
                'role' => 'Reviewer 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return redirect()->intended('/dosen/reviewer-1/penilaian-seminar/' . $penilaianseminar->id . '/edit');
        }
    }

    public function edit($id)
    {
        $penilaianseminar = PenilaianSeminar::with('mahasiswa')->find($id);
        if ($penilaianseminar->r1_presentasi != null) {
            return view('dosen.reviewer.isian-penilaian-seminar', [
                'title' => 'Edit Penilaian Seminar',
                'role' => 'Reviewer 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        } else {
            return view('dosen.reviewer.create-penilaian-seminar', [
                'title' => 'Form Penilaian Seminar',
                'role' => 'Reviewer 1',
                'penilaianSeminar' => $penilaianseminar
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $file = request()->validate([
            'r1_file' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('r1_file')) {
            $file['r1_file'] = request()->file('r1_file')->store('penilaian_seminar_r1_file');
        } else $file['r1_file'] = null;

        PenilaianSeminar::with('mahasiswa')->find($id)->update([
            'r1_presentasi' => $request['r1_presentasi'],
            'r1_dokumentasi' => $request['r1_dokumentasi'],
            'r1_rumusanMasalah' => $request['r1_rumusanMasalah'],
            'r1_metodeDanPustaka' => $request['r1_metodeDanPustaka'],
            'r1_catatan' => $request['r1_catatan'],
            'r1_file' => $file['r1_file']
        ]);

        return redirect()->intended('/dosen/reviewer-1/penilaian-seminar')->with('success', 'Penilaian telah ditambahkan!');
    }

    public function downloadFile($id)
    {
        $data = PenilaianSeminar::find($id);
        $filepath = public_path("storage/{$data->r1_file}");
        return response()->download($filepath);
    }
}