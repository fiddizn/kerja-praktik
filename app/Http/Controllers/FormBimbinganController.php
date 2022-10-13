<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ListBimbingan;
use App\Models\Review;
use Illuminate\Http\Request;

class FormBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get();
        return view(
            'mahasiswa.form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingans' => $bimbingans
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'mahasiswa.isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => null
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_p1 = self::isP1($request->is_p1);
        ListBimbingan::with('bimbingan')->create([
            'bimbingan_id' => auth()->user()->bimbingan->id,
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'is_p1' => $is_p1
        ]);
        return redirect(route('form-bimbingan.store'))->with('success', 'Form bimbimgan telah dibuat!');
    }

    public function isP1($name)
    {
        return ($name == auth()->user()->bimbingan->pembimbing1->dosen->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->where('id', $x)->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->first();

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
                'nama_pembimbing' => $nama_pembimbing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}