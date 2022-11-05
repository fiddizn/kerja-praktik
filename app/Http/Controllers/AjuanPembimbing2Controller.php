<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AjuanPembimbing2Controller extends Controller
{
    public function index()
    {
        $namaDosenDanJabfung = auth()->user()->pembimbing2->dosen->name . ' (' .  auth()->user()->dosen->jabfung->name . ')';
        $pendaftarans = Pendaftaran::where('alt1_p2', $namaDosenDanJabfung)
            ->orWhere('alt2_p2', $namaDosenDanJabfung)
            ->orWhere('alt3_p2', $namaDosenDanJabfung)
            ->orWhere('alt4_p2', $namaDosenDanJabfung)
            ->filterAjuanPembimbing(request('search'))->paginate(7)->withQueryString();
        return view('dosen.pembimbing.ajuan-pembimbing-2-index', [
            'title' => 'Ajuan Pembimbing',
            'role' => 'Pembimbing 2',
            'pendaftarans' => $pendaftarans,
            'namaDosenDanJabfung' => $namaDosenDanJabfung
        ]);
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('dosen.pembimbing.ajuan-pembimbing-2-show', [
            'title' => 'Detail Mahasiswa',
            'role' => 'Pembimbing 2',
            'pendaftaran' => $pendaftaran
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
    public function update(Request $request, $id, $ajuanAlternatif)
    {
        Pendaftaran::find($id)->update([
            $ajuanAlternatif => $request[$ajuanAlternatif]
        ]);
        if ($request[$ajuanAlternatif] == 1) {
            return redirect()->back()->with('success', 'Ajuan mahasiswa telah disetujui!');
        } else {
            return redirect()->back()->with('success', 'Ajuan mahasiswa telah ditolak!');
        }
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