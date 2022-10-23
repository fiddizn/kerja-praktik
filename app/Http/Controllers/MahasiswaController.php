<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(auth()->user()->pendaftaran) && auth()->user()->pendaftaran->alt4_p2 == null) {
            $mahasiswa_id = auth()->user()->mahasiswa->id;
            $Pendaftaran = \App\Models\Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->first();
            $Pendaftaran->delete();
        }
        $pendaftaran = auth()->user()->mahasiswa->pendaftaran;
        $hasilReview = auth()->user()->mahasiswa->review;
        $formBimbingan = auth()->user()->mahasiswa->bimbingan;
        $pendaftaranSeminar = auth()->user()->mahasiswa->pendaftaranseminar;
        return view('mahasiswa.mahasiswa', [
            'title' => 'Home',
            'role' => 'Mahasiswa',
            'pendaftaran' => $pendaftaran,
            'hasilReview' => $hasilReview,
            'formBimbingan' => $formBimbingan,
            'pendaftaranSeminar' => $pendaftaranSeminar
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
        //
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