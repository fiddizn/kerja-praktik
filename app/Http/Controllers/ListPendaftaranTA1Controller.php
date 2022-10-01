<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
// use Clockwork\Storage\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListPendaftaranTA1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_pendaftaran = Pendaftaran::with('mahasiswa')->oldest()->filter(request('search'))->paginate(7)->withQueryString();
        return view(
            'k-list-pendaftaran-ta-1',
            [
                'title' => 'Pendaftaran Administrasi TA 1',
                'role' => 'Koordinator',
                'list_pendaftaran' => $list_pendaftaran
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->find($id);
        return view('k-detail-mahasiswa', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Koordinator',
            'pendaftaran' => $pendaftaran
        ]);
    }
    public function downloadTagihanUang($id)
    {
        $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->tagihan_uang}");
        return response()->download($filepath);
    }
    public function downloadLunasPembayaran($id)
    {
        $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->lunas_pembayaran}");
        return response()->download($filepath);
    }
    public function downloadBerkasTa1($id)
    {
        $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->berkas_ta1}");
        return response()->download($filepath);
    }
    public function downloadKhs($id)
    {
        $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->khs}");
        return response()->download($filepath);
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
    public function update($id)
    {
        $pendaftaran = Pendaftaran::where('id', $id)->get()[0];
        if (request('status') != $pendaftaran->status) {
            Pendaftaran::where('id', $id)->update(['status' => request('status')]);
        } else {
            Pendaftaran::where('id', $id)->update([
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
                'khs' => request('khs'),
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
                'status' => request('status'),
            ]);
        }
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

        Mahasiswa::where('id', $pendaftaran->mahasiswa_id)->update([
            'pendaftaran_administrasi_id' => null
        ]);

        return redirect('/koordinator/list-pendaftaran-ta-1')->with('success', 'Pendaftaran telah dihapus!');
    }
}