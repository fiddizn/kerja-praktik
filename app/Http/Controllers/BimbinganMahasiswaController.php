<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ListBimbingan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class BimbinganMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Pendaftaran::with('mahasiswa')->where('p1_id', auth()->user()->pembimbing1->id)->filterAjuanPembimbing(request('search'))->paginate(5)->withQueryString();;
        return view('dosen.pembimbing.bimbingan-index', [
            'title' => 'Bimbingan Mahasiswa',
            'role' => 'Pembimbing 1',
            'mahasiswas' => $mahasiswas
        ]);
    }

    public function show($id)
    {
        $nama_mhs = Mahasiswa::where('id', $id)->first()->name;
        $nim_mhs = Mahasiswa::where('id', $id)->first()->nim;
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan', 'mahasiswa')->oldest()->where('is_p1', 1)->whereHas('bimbingan', function ($query) use ($id) {
            $query->where('pembimbing1_id', auth()->user()->pembimbing1->id)->where('mahasiswa_id', $id);
        })->paginate(5);
        return view(
            'dosen.pembimbing.form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'role' => 'Pembimbing 1',
                'bimbingans' => $bimbingans,
                'mahasiswa_id' => $id,
                'nim' => $nim_mhs,
                'name' => $nama_mhs,
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

    public function setPersetujuanBimbingan($mahasiswa_id, $bimbingan_ke)
    {
        \App\Models\ListBimbingan::where('is_p1', 1)->whereHas('bimbingan', function ($query) use ($mahasiswa_id) {
            $query->where('pembimbing1_id', auth()->user()->pembimbing1->id)->where('mahasiswa_id', $mahasiswa_id);
        })->get()[$bimbingan_ke - 1]->update([
            'setuju' => request('setuju')
        ]);
        return redirect('/dosen/pembimbing-1/form-bimbingan/' . $mahasiswa_id)->with('success', 'Persetujuan form bimbingan telah diperbarui!');
    }
}