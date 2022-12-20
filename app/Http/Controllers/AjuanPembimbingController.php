<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AjuanPembimbingController extends Controller
{
    public function index()
    {
        $namaDosenDanJabfung = auth()->user()->pembimbing2->dosen->name . ' (' .  auth()->user()->dosen->jabfung->name . ')';
        $pendaftarans = Pendaftaran::where('alt1_p1', $namaDosenDanJabfung)
            ->orWhere('alt2_p1', $namaDosenDanJabfung)
            ->orWhere('alt3_p1', $namaDosenDanJabfung)
            ->orWhere('alt4_p1', $namaDosenDanJabfung)
            ->orWhere('alt1_p2', $namaDosenDanJabfung)
            ->orWhere('alt2_p2', $namaDosenDanJabfung)
            ->orWhere('alt3_p2', $namaDosenDanJabfung)
            ->orWhere('alt4_p2', $namaDosenDanJabfung)
            ->filterAjuanPembimbing(request('search'))->paginate(7)->withQueryString();

        return view('dosen.pembimbing.ajuan-pembimbing-index', [
            'title' => 'Ajuan Pembimbing',
            'role' => 'Pembimbing 1',
            'pendaftarans' => $pendaftarans,
            'namaDosenDanJabfung' => $namaDosenDanJabfung
        ]);
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('dosen.pembimbing.ajuan-pembimbing-show', [
            'title' => 'Detail Mahasiswa',
            'role' => 'Dosen',
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function setuju($id, $ajuanAlternatif)
    {
        Pendaftaran::find($id)->update([
            $ajuanAlternatif => 1
        ]);
        return redirect()->back()->with('success', 'Ajuan mahasiswa telah disetujui!');
    }

    public function tolak($id, $ajuanAlternatif)
    {
        Pendaftaran::find($id)->update([
            $ajuanAlternatif => 0
        ]);
        return redirect()->back()->with('success', 'Ajuan mahasiswa telah ditolak!');
    }

    public function reset($id, $ajuanAlternatif)
    {
        Pendaftaran::find($id)->update([
            $ajuanAlternatif => null
        ]);
        return redirect()->back()->with('success', 'Ajuan mahasiswa telah diatur ulang!');
    }

    public function downloadBerkasTA1($id)
    {
        $data = Pendaftaran::where('id', $id)->first();
        $filepath = public_path("storage/{$data->berkas_ta1}");
        return response()->download($filepath);
    }

    public function downloadKHS($id)
    {
        $data = Pendaftaran::where('id', $id)->first();
        $filepath = public_path("storage/{$data->khs}");
        return response()->download($filepath);
    }
}