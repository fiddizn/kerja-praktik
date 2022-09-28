<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{

    public function index()
    {
        if (!isset(auth()->user()->pendaftaran)) {
            return view('m-pendaftaran-ta-1', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'seminar' => ''
            ]);
        } else {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-1/status');
        }
    }
    public function store(Request $request)
    {
        Pendaftaran::create([
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

        return redirect()->intended('/mahasiswa/pendaftaran-ta-1/status');
    }

    public function status()
    {
        return view('m-status-pendaftaran-ta-1', [
            'title' => 'Status Pendaftaran TA 1',
            'name' => 'Fahmi Yusron Fiddin',
            'role' => 'Mahasiswa'
        ]);
    }
}