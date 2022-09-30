<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class ListPendaftaranTA1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_pendaftaran = Pendaftaran::oldest()->filter(request('search'))->paginate(7)->withQueryString();
        return view(
            'k-list-pendaftaran-ta-1',
            [
                'title' => 'Pendaftaran Administrasi TA 1',
                'name' => 'Galang Setia Nugroho',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_pendaftaran
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
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('k-detail-mahasiswa', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'pendaftaran' => $pendaftaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('k-edit-detail-mahasiswa', [
            'pendaftaran' => $pendaftaran,
            'title' => 'Edit Pendaftaran',
            'role' => 'Koordinator'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pendaftaran::where('id', $id)->update([
            'nim' => request('nim'),
            'name' => request('name'),
            'user_id' => auth()->user()->id,
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'gender' => request('gender'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
            'peminatan' => request('peminatan'),
            'angkatan' => request('angkatan'),
            'ipk' => request('ipk'),
            'jumlah_sks' => request('jumlah_sks'),
            'jumlah_teori_d' => request('jumlah_teori_d'),
            'jumlah_prak_d' => request('jumlah_prak_d'),
            'jumlah_e' => request('jumlah_e'),
            'algo' => request('algo'),
            'strukdat' => request('strukdat'),
            'basdat' => request('basdat'),
            'rpl' => request('rpl'),
            'metpen' => request('metpen'),
            'pemweb' => request('pemweb'),
            'prak_pemweb' => request('prak_pemweb'),
            'po1' => request('po1'),
            'prak_po1' => request('prak_po1'),
            'appl' => request('appl'),
            'tagihan_uang' => request('tagihan_uang'),
            'lunas_pembayaran' => request('lunas_pembayaran'),
            'judul_ta1' => request('judul_ta1'),
            'berkas_ta1' => request('berkas_ta1'),
            'alt1_p1' => request('alt1_p1'),
            'alt1_p2' => request('alt1_p2'),
            'alt2_p1' => request('alt2_p1'),
            'alt2_p2' => request('alt2_p2'),
            'alt3_p1' => request('alt3_p1'),
            'alt3_p2' => request('alt3_p2'),
            'alt4_p1' => request('alt4_p1'),
            'alt4_p2' => request('alt4_p2'),
            'status' => '',
        ]);
        return redirect('/koordinator/list-pendaftaran-ta-1')->with('success', 'Pendaftaran telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->delete();
        return redirect('/koordinator/list-pendaftaran-ta-1')->with('success', 'Pendaftaran telah dihapus!');
    }
}