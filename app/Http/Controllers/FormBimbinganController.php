<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ListBimbingan;
use App\Models\Review;
use Illuminate\Http\Request;

class FormBimbinganController extends Controller
{
    public function index()
    {
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get();
        return view(
            'mahasiswa.form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Mahasiswa',
                'bimbingans' => $bimbingans
            ]
        );
    }

    public function index_p1()
    {
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', true)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->paginate(5);
        $nid = auth()->user()->bimbingan->pembimbing1->dosen->nid;
        $name = auth()->user()->bimbingan->pembimbing1->dosen->name;
        return view(
            'mahasiswa.form-bimbingan-p1',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Mahasiswa',
                'bimbingans' => $bimbingans,
                'nid' => $nid,
                'name' => $name,
            ]
        );
    }

    public function index_p2()
    {
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', false)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->paginate(5);
        $nid = auth()->user()->bimbingan->pembimbing2->dosen->nid;
        $name = auth()->user()->bimbingan->pembimbing2->dosen->name;
        return view(
            'mahasiswa.form-bimbingan-p2',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Mahasiswa',
                'bimbingans' => $bimbingans,
                'nid' => $nid,
                'name' => $name,
            ]
        );
    }

    public function create_p1()
    {
        return view(
            'mahasiswa.isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => null,
                'is_p1' => true
            ]
        );
    }

    public function create_p2()
    {
        return view(
            'mahasiswa.isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => null,
                'is_p1' => false
            ]
        );
    }

    public function store_p1(Request $request)
    {
        if ($request['pembahasan_bimbingan'] == null) {
            return redirect()->back()->with('gagal', 'Mohon isi pembahasan bimbingan!');
        }
        $is_p1 = self::isP1($request->is_p1);
        ListBimbingan::with('bimbingan')->create([
            'bimbingan_id' => auth()->user()->bimbingan->id,
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'is_p1' => $is_p1
        ]);
        return redirect('/mahasiswa/form-bimbingan/pembimbing-1')->with('success', 'Form bimbingan baru telah ditambahkan!');
    }

    public function store_p2(Request $request)
    {
        if ($request['pembahasan_bimbingan'] == null) {
            return redirect()->back()->with('gagal', 'Mohon isi pembahasan bimbingan!');
        }
        $is_p1 = self::isP1($request->is_p1);
        ListBimbingan::with('bimbingan')->create([
            'bimbingan_id' => auth()->user()->bimbingan->id,
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'is_p1' => $is_p1
        ]);
        return redirect('/mahasiswa/form-bimbingan/pembimbing-2')->with('success', 'Form bimbingan baru telah ditambahkan!');
    }

    public function show_p1($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', true)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.detail-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing,
                'is_p1' => true
            ]
        );
    }

    public function show_p2($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', false)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.detail-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing,
                'is_p1' => false
            ]
        );
    }

    public function edit_p1($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', true)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.edit-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing,
                'is_p1' => true
            ]
        );
    }

    public function edit_p2($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', false)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.edit-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing,
                'is_p1' => false
            ]
        );
    }


    public function update_p1(Request $request, $x)
    {
        // $is_p1 = self::isP1($request->is_p1);
        \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', true)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1]->update([
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'setuju' => null
        ]);
        return redirect('/mahasiswa/form-bimbingan/pembimbing-1')->with('success', 'Form bimbimgan telah diperbarui!');
    }

    public function update_p2(Request $request, $x)
    {
        // $is_p1 = self::isP1($request->is_p1);
        \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('is_p1', false)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1]->update([
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'setuju' => null
        ]);
        return redirect('/mahasiswa/form-bimbingan/pembimbing-2')->with('success', 'Form bimbimgan telah diperbarui!');
    }

    public function isP1($name)
    {
        return ($name == auth()->user()->bimbingan->pembimbing1->dosen->name);
    }
}