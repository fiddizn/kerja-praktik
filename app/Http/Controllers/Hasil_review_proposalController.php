<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hasil_review_proposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'k-hasil-review',
            [
                'title' => 'Hasil Review Proposal',
                'name' => 'Galang Setia Nugroho',
                'role' => 'Koordinator',
                'list_mahasiswa' => \App\Models\Pendaftaran::latest()->filter(request('search'))->paginate(7)->withQueryString()
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
    public function show(\App\Models\Pendaftaran $id)
    {
        return view('k-detail-hasil-review', [
            'title' => 'Hasil Review Proposal',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'mahasiswa' => $id
        ]);
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