<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\PendaftaranSeminar;
use Illuminate\Http\Request;

class TUPendaftaranAdministrasiController extends Controller
{
    public function index()
    {
        $list_pendaftaran = Pendaftaran::with('mahasiswa')->oldest()->filter(request('search'))
            ->orderBy(Mahasiswa::select('name')->whereColumn('mahasiswas.id', 'pendaftarans.mahasiswa_id'))->filter(request('search'))->paginate(7)->withQueryString();
        return view(
            'tu.list-pendaftaran-ta-1',
            [
                'title' => 'Pendaftaran Administrasi TA 1',
                'role' => 'Tata Usaha',
                'list_pendaftaran' => $list_pendaftaran
            ]
        );
    }

    public function keterangan($id, $kelolosan)
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->find($id);
        return view('tu.catatan', [
            'title' => 'Pendaftaran TA 1',
            'role' => 'Tata Usaha',
            'status_kelolosan' => $kelolosan,
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function edit_keterangan_kelolosan($id)
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->where('id', $id)->get()[0];
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
        Pendaftaran::where('id', $id)->update([
            'status' => request('status'),
            'keterangan_status' => $syarat
        ]);

        if (request('status') == 'Lolos Bersyarat' && PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first() != null) {
        } elseif (request('status') == 'Lolos Bersyarat') {
            PendaftaranSeminar::create([
                'mahasiswa_id' => $mahasiswa_id,
                'tempat_lahir' => $pendaftaran['tempat_lahir'],
                'tanggal_lahir' => $pendaftaran['tanggal_lahir'],
                'gender' => $pendaftaran['gender'],
                'phone_number' => $pendaftaran['phone_number'],
                'address' => $pendaftaran['address'],
                'peminatan' => $pendaftaran['peminatan'],
                'angkatan' => $pendaftaran['angkatan'],
                'ipk' => $pendaftaran['ipk'],
                'jumlah_sks' => $pendaftaran['jumlah_sks'],
                'jumlah_teori_d' => $pendaftaran['jumlah_teori_d'],
                'jumlah_prak_d' => $pendaftaran['jumlah_prak_d'],
                'jumlah_e' => $pendaftaran['jumlah_e'],
                'algo' => $pendaftaran['algo'],
                'strukdat' => $pendaftaran['strukdat'],
                'basdat' => $pendaftaran['basdat'],
                'rpl' => $pendaftaran['rpl'],
                'metpen' => $pendaftaran['metpen'],
                'pemweb' => $pendaftaran['pemweb'],
                'prak_pemweb' => $pendaftaran['prak_pemweb'],
                'po1' => $pendaftaran['po1'],
                'prak_po1' => $pendaftaran['prak_po1'],
                'appl' => $pendaftaran['appl']
            ]);
        } elseif (request('status') == 'Tidak Lolos' && PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first() != null) {
            PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first()->delete();
        }

        return redirect('/tu/pendaftaran-administrasi')->with('success', 'Status kelolosan telah diperbarui!');
    }

    public function update($id)
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->where('id', $id)->get()[0];
        $mahasiswa_id = $pendaftaran->mahasiswa_id;
        if (request('status') != $pendaftaran->status) {
            Pendaftaran::where('id', $id)->update(['status' => request('status')]);
            if (request('status') == 'Lolos' && PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first() != null) {
            } elseif (request('status') == 'Lolos') {
                PendaftaranSeminar::create([
                    'mahasiswa_id' => $mahasiswa_id,
                    'tempat_lahir' => $pendaftaran['tempat_lahir'],
                    'tanggal_lahir' => $pendaftaran['tanggal_lahir'],
                    'gender' => $pendaftaran['gender'],
                    'phone_number' => $pendaftaran['phone_number'],
                    'address' => $pendaftaran['address'],
                    'peminatan' => $pendaftaran['peminatan'],
                    'angkatan' => $pendaftaran['angkatan'],
                    'ipk' => $pendaftaran['ipk'],
                    'jumlah_sks' => $pendaftaran['jumlah_sks'],
                    'jumlah_teori_d' => $pendaftaran['jumlah_teori_d'],
                    'jumlah_prak_d' => $pendaftaran['jumlah_prak_d'],
                    'jumlah_e' => $pendaftaran['jumlah_e'],
                    'algo' => $pendaftaran['algo'],
                    'strukdat' => $pendaftaran['strukdat'],
                    'basdat' => $pendaftaran['basdat'],
                    'rpl' => $pendaftaran['rpl'],
                    'metpen' => $pendaftaran['metpen'],
                    'pemweb' => $pendaftaran['pemweb'],
                    'prak_pemweb' => $pendaftaran['prak_pemweb'],
                    'po1' => $pendaftaran['po1'],
                    'prak_po1' => $pendaftaran['prak_po1'],
                    'appl' => $pendaftaran['appl']
                ]);
            } elseif (request('status') == 'Pending' && PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first() != null) {
                PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first()->delete();
            }
            return redirect('/tu/pendaftaran-administrasi')->with('success', 'Status kelolosan telah diperbarui!');
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

            $mahasiswa_id =  Pendaftaran::where('id', $id)->get()[0]->mahasiswa_id;
            Mahasiswa::where('id', $mahasiswa_id)->update([
                'name' => request('name'),
                'nim' => request('nim')
            ]);
            return redirect('/tu/pendaftaran-administrasi')->with('success', 'Pendaftaran telah diperbarui!');
        }
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->find($id);
        return view('tu.detail-mahasiswa', [
            'title' => 'Pendaftaran TA 1',
            'name' => 'Galang Setia Nugroho',
            'role' => 'Tata Usaha',
            'pendaftaran' => $pendaftaran,
            'status' => $pendaftaran->status
        ]);
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('tu.edit-detail-mahasiswa', [
            'pendaftaran' => $pendaftaran,
            'title' => 'Edit Pendaftaran',
            'role' => 'Tata Usaha'
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
        if ($data->berkas_ta1 == null) {
            return back()->with('null', 'File tidak ada!');
        } else {
            return response()->download($filepath);
        }
    }
    public function downloadKhs($id)
    {
        $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
        $filepath = public_path("storage/{$data->khs}");
        return response()->download($filepath);
    }
}