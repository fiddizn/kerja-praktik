<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{

    public function index()
    {
        $list_p1 = \App\Models\Pembimbing1::with('dosen')->get();
        $list_p2 = \App\Models\Dosen::all();

        if (!isset(auth()->user()->pendaftaran)) {
            return view('m-pendaftaran-ta-1', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'seminar' => '',
                'list_p1' => $list_p1,
                'list_p2' => $list_p2
            ]);
        } else {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-1/status');
        }
    }
    public function store()
    {
        $file = request()->validate([
            'berkas_ta1' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
            'tagihan_uang' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
            'lunas_pembayaran' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx',
            'khs' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);

        if (request()->file('berkas_ta1')) {
            $file['berkas_ta1'] = request()->file('berkas_ta1')->store('berkas_ta1');
        } else $file['berkas_ta1'] = null;
        if (request()->file('tagihan_uang')) {
            $file['tagihan_uang'] = request()->file('tagihan_uang')->store('tagihan_uang');
        } else $file['tagihan_uang'] = null;
        if (request()->file('lunas_pembayaran')) {
            $file['lunas_pembayaran'] = request()->file('lunas_pembayaran')->store('lunas_pembayaran');
        } else $file['lunas_pembayaran'] = null;
        if (request()->file('khs')) {
            $file['khs'] = request()->file('khs')->store('khs');
        } else $file['khs'] = null;

        Pendaftaran::create([
            'mahasiswa_id' => auth()->user()->mahasiswa->id,
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
            'berkas_ta1' => $file['berkas_ta1'],
            'tagihan_uang' => $file['tagihan_uang'],
            'lunas_pembayaran' => $file['lunas_pembayaran'],
            'khs' => $file['khs'],
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

        Mahasiswa::where('id', auth()->user()->mahasiswa->id)->update([
            'pendaftaran_administrasi_id' => auth()->user()->pendaftaran->id
        ]);

        return redirect()->intended('/mahasiswa/pendaftaran-ta-1/status');
    }

    public function status()
    {
        // dd(auth()->user()->pendaftaran->status == 'Lolos');
        return view('m-status-pendaftaran-ta-1', [
            'title' => 'Status Pendaftaran TA 1',
            'name' => 'Fahmi Yusron Fiddin',
            'role' => 'Mahasiswa',
            'status' => auth()->user()->pendaftaran->status
        ]);
    }
}