<?php

namespace App\Http\Controllers;

use App\Models\KunciPendaftaran;
use App\Models\PendaftaranSeminar;
use Illuminate\Http\Request;

class PendaftaranSeminarController extends Controller
{
    public function index()
    {
        $list_p1 = \App\Models\Pembimbing1::with('dosen')->get();
        $list_p2 = \App\Models\Dosen::all();

        $angka_mutus = ['A', 'AB', 'B', 'BC', 'C', 'D', 'E', 'Belum Diambil'];
        $status_matkuls = ['Sudah Selesai', 'Sedang Diambil', 'Belum Diambil'];

        if (!isset(auth()->user()->pendaftaranseminar->berkas_ta1)) {
            if (KunciPendaftaran::first()->seminar == 1) {
                return redirect()->intended('/mahasiswa')->with('gagal', 'Maaf, pendaftaran seminar sudah ditutup!');
            }
            return view('mahasiswa.pendaftaran-seminar-ta-1', [
                'title' => 'Pendaftaran Seminar TA 1',
                'role' => 'Mahasiswa',
                'seminar' => ' Seminar ',
                'list_p1' => $list_p1,
                'list_p2' => $list_p2,
                'angka_mutus' => $angka_mutus,
                'status_matkuls' => $status_matkuls
            ]);
        } else {
            return redirect()->intended('/mahasiswa/pendaftaran-seminar-ta-1/status');
        }
    }

    public function store(Request $request)
    {
        $file = request()->validate([
            'berkas_ta1' => 'file|max:10120|mimes:doc,docx,pdf,ppt,pptx',
            'tagihan_uang' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx',
            'lunas_pembayaran' => 'file|max:10120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx',
            'khs' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);

        if (request()->file('berkas_ta1')) {
            $file['berkas_ta1'] = request()->file('berkas_ta1')->store('seminar_berkas_ta1');
        } else $file['berkas_ta1'] = null;
        if (request()->file('tagihan_uang')) {
            $file['tagihan_uang'] = request()->file('tagihan_uang')->store('seminar_tagihan_uang');
        } else $file['tagihan_uang'] = null;
        if (request()->file('lunas_pembayaran')) {
            $file['lunas_pembayaran'] = request()->file('lunas_pembayaran')->store('seminar_lunas_pembayaran');
        } else $file['lunas_pembayaran'] = null;
        if (request()->file('khs')) {
            $file['khs'] = request()->file('khs')->store('seminar_khs');
        } else $file['khs'] = null;

        $pendaftaran = PendaftaranSeminar::where('mahasiswa_id', auth()->user()->mahasiswa->id)->update([
            'r1_id' => auth()->user()->pendaftaran->r1_id,
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
            'judul_ta1' => request('judul_ta1'),
            'berkas_ta1' => $file['berkas_ta1'],
            'tagihan_uang' => $file['tagihan_uang'],
            'lunas_pembayaran' => $file['lunas_pembayaran'],
            'khs' => $file['khs'],
            'status' => ''
        ]);

        return redirect()->intended('/mahasiswa/pendaftaran-seminar-ta-1/status');
    }

    public function status()
    {
        return view('mahasiswa.status-pendaftaran-seminar-ta-1', [
            'title' => 'Status Pendaftaran Seminar TA 1',
            'role' => 'Mahasiswa',
            'status' => auth()->user()->pendaftaranseminar->status
        ]);
    }

    public function showSyarat()
    {
        return view('mahasiswa.syarat-pendaftaran-seminar-ta-1', [
            'title' => 'Status Pendaftaran Seminar TA 1',
            'role' => 'Mahasiswa',
            'syarat' => auth()->user()->pendaftaranseminar->keterangan_status
        ]);
    }

    public function showAlasan()
    {
        return view('mahasiswa.syarat-pendaftaran-seminar-ta-1', [
            'title' => 'Status Pendaftaran Seminar TA 1',
            'role' => 'Mahasiswa',
            'syarat' => auth()->user()->pendaftaranseminar->keterangan_status
        ]);
    }
}