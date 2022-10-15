<?php

namespace App\Http\Controllers;

use App\Models\ListBimbingan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class BimbinganMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Pendaftaran::with('mahasiswa')->where('p1_id', auth()->user()->pembimbing1->id)->paginate(5);
        return view('dosen.pembimbing.bimbingan-index', [
            'title' => 'Bimbingan Mahasiswa',
            'role' => 'Pembimbing 1',
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan', 'mahasiswa')->oldest()->where('is_p1', 1)->whereHas('bimbingan', function ($query) use ($id) {
            $query->where('pembimbing1_id', auth()->user()->pembimbing1->id)->where('mahasiswa_id', $id);
        })->get();
        return view(
            'dosen.pembimbing.form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Pembimbing 1',
                'bimbingans' => $bimbingans,
                'mahasiswa_id' => $id
            ]
        );
    }

    public function showDetailBimbingan($mahasiswa_id, $bimbingan_ke)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan', 'mahasiswa')->oldest()->where('is_p1', 1)->whereHas('bimbingan', function ($query) use ($mahasiswa_id) {
            $query->where('pembimbing1_id', auth()->user()->pembimbing1->id)->where('mahasiswa_id', $mahasiswa_id);
        })->get()[$bimbingan_ke - 1];
        return view(
            'dosen.pembimbing.detail-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Pembimbing 1',
                'bimbingan' => $bimbingan,
                'bimbingan_ke' => $bimbingan_ke,
                'mahasiswa_id' => $mahasiswa_id
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

    public function setPersetujuanBimbingan($mahasiswa_id, $bimbingan_ke)
    {
        $bimbingan = \App\Models\ListBimbingan::where('is_p1', 1)->whereHas('bimbingan', function ($query) use ($mahasiswa_id) {
            $query->where('pembimbing1_id', auth()->user()->pembimbing1->id)->where('mahasiswa_id', $mahasiswa_id);
        })->get()[$bimbingan_ke - 1]->update([
            'setuju' => request('setuju')
        ]);
        return redirect('/dosen/pembimbing-1/form-bimbingan/' . $mahasiswa_id)->with('success', 'Pendaftaran telah diperbarui!');
    }
}