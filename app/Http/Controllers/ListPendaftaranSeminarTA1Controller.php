<?php

namespace App\Http\Controllers;

use App\Models\KunciPendaftaran;
use App\Models\Mahasiswa;
use App\Models\PendaftaranSeminar;
use Illuminate\Http\Request;

class ListPendaftaranSeminarTA1Controller extends Controller
{
    public function index(Request $request)
    {
        $kuncipendaftaran = KunciPendaftaran::first();
        $list_pendaftaran = PendaftaranSeminar::with('mahasiswa')->where('berkas_ta1', '!=', null)->filter(request('search'));

        if ($request->sortBy) {
            $list_pendaftaran = $list_pendaftaran->orderBy(Mahasiswa::select($request->sortBy)->whereColumn('mahasiswas.id', 'pendaftaran_seminars.mahasiswa_id'), $request->sortAsc);
        }

        $list_pendaftaran = $list_pendaftaran->paginate(7);
        return view(
            'koordinator.list-pendaftaran-seminar-ta-1',
            [
                'title' => 'Pendaftaran Seminar TA 1',
                'role' => 'Koordinator',
                'list_pendaftaran' => $list_pendaftaran,
                'kuncipendaftaran' => $kuncipendaftaran,
                'sortBy' => $request->sortBy,
                'sortAsc' => $request->sortAsc,
                'search' => $request->search
            ]
        );
    }

    public function keterangan($id, $kelolosan)
    {
        $pendaftaran = PendaftaranSeminar::with('mahasiswa')->find($id);
        return view('koordinator.catatan-kelolosan-seminar', [
            'title' => 'Pendaftaran TA 1',
            'role' => 'Koordinator',
            'status_kelolosan' => $kelolosan,
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function edit_keterangan_kelolosan($id)
    {
        $pendaftaran = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->get()[0];
        $mahasiswa_id = $pendaftaran->mahasiswa_id;
        $syarat = '';
        for ($i = 1; $i <= 16; $i++) {
            if (request($i) != NULL) {
                $syarat .= '- ' . request($i) . ' <br>';
            }
        }
        $syarat_div = request('keterangan_status');
        $str_pos = strpos($syarat_div, '>');
        $syarat_div = substr($syarat_div, 0, $str_pos + 1) . '- ' . substr($syarat_div, 5);
        if (request('keterangan_status') != null) {
            $syarat .= $syarat_div;
        }
        PendaftaranSeminar::where('id', $id)->update([
            'status' => request('status'),
            'keterangan_status' => $syarat
        ]);

        return redirect('/koordinator/list-pendaftaran-seminar-ta-1')->with('success', 'Status kelolosan telah diperbarui!');
    }

    public function show($id)
    {
        $pendaftaran = PendaftaranSeminar::with('mahasiswa')->find($id);
        return view('koordinator.detail-mahasiswa-seminar', [
            'title' => 'Pendaftaran TA 1',
            'role' => 'Koordinator',
            'pendaftaran' => $pendaftaran,
            'status' => $pendaftaran->status
        ]);
    }

    public function edit($id)
    {
        $pendaftaran = PendaftaranSeminar::find($id);
        return view('koordinator.edit-detail-mahasiswa', [
            'pendaftaran' => $pendaftaran,
            'title' => 'Edit Pendaftaran',
            'role' => 'Koordinator'
        ]);
    }

    public function update($id)
    {
        $pendaftaran = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->get()[0];
        $mahasiswa_id = $pendaftaran->mahasiswa_id;
        if (request('status') != $pendaftaran->status) {
            PendaftaranSeminar::where('id', $id)->update(['status' => request('status')]);
            return redirect('/koordinator/list-pendaftaran-seminar-ta-1')->with('success', 'Status kelolosan telah diperbarui!');
        } else {
            PendaftaranSeminar::where('id', $id)->update([
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
                // 'tagihan_uang' => request('tagihan_uang'),
                // 'lunas_pembayaran' => request('lunas_pembayaran'),
                // 'khs' => request('khs'),
                // 'berkas_ta1' => request('berkas_ta1'),
                'judul_ta1' => request('judul_ta1'),
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

            $mahasiswa_id =  PendaftaranSeminar::where('id', $id)->get()[0]->mahasiswa_id;
            Mahasiswa::where('id', $mahasiswa_id)->update([
                'name' => request('name'),
                'nim' => request('nim')
            ]);
            return redirect('/koordinator/list-pendaftaran-seminar-ta-1')->with('success', 'Pendaftaran telah diperbarui!');
        }
    }

    public function downloadTagihanUang($id)
    {
        $data = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->tagihan_uang}");
        return response()->download($filepath);
    }
    public function downloadLunasPembayaran($id)
    {
        $data = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->lunas_pembayaran}");
        return response()->download($filepath);
    }
    public function downloadBerkasTa1($id)
    {
        $data = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->berkas_ta1}");
        if ($data->berkas_ta1 == null) {
            return back()->with('null', 'File tidak ada!');
        } else {
            return response()->download($filepath);
        }
    }
    public function downloadKhs($id)
    {
        $data = PendaftaranSeminar::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->khs}");
        return response()->download($filepath);
    }
}