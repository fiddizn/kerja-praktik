<?php

namespace App\Http\Controllers;

use App\Models\ProposalHasilRevisi;
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

    public function create()
    {
        if (auth()->user()->proposalhasilrevisi == null) {
            return view('mahasiswa.create-revisi-seminar', [
                'title' => 'Upload Revisi Seminar',
                'role' => 'Mahasiswa'
            ]);
        } else {
            return view('mahasiswa.update-revisi-seminar', [
                'title' => 'Update Revisi Seminar',
                'role' => 'Mahasiswa'
            ]);
        }
    }

    public function update(Request $request)
    {
        $file = request()->validate(['file' => 'file|max:5120|mimes:doc,docx,pdf']);
        if (request()->file('file')) {
            $file['file'] = request()->file('file')->store('proposalHasilRevisi');
        } else $file['file'] = null;

        ProposalHasilRevisi::where('mahasiswa_id', auth()->user()->mahasiswa->id)->update([
            'file' => $file['file']
        ]);
        return redirect('/mahasiswa/revisi-seminar')->with('success', 'Proposal berhasil diupdate!');
    }

    public function store(Request $request)
    {
        $file = request()->validate(['file' => 'file|max:5120|mimes:doc,docx,pdf']);
        if (request()->file('file')) {
            $file['file'] = request()->file('file')->store('proposalHasilRevisi');
        } else $file['file'] = null;

        ProposalHasilRevisi::create([
            'mahasiswa_id' => auth()->user()->mahasiswa->id,
            'file' => $file['file']
        ]);
        return redirect('/mahasiswa/revisi-seminar')->with('success', 'Proposal berhasil diupload!');
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