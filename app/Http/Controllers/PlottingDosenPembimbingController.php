<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pembimbing1;
use App\Models\Pembimbing2;
use Illuminate\Http\Request;

class PlottingDosenPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = \App\Models\Pendaftaran::with('mahasiswa')->oldest()->where('status', 'Lolos')->orWhere('status', 'Lolos Bersyarat')->filter(request('search'))->paginate(7)->withQueryString();
        return view(
            'koordinator.plotting-dosen-pembimbing',
            [
                'title' => 'Plotting Dosen Pembimbing',
                'name' => 'Galang Setia Nugroho',
                'role' => 'Koordinator',
                'pendaftarans' => $pendaftarans
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
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftarans = \App\Models\Pendaftaran::with('mahasiswa', 'pembimbing1', 'pembimbing2')->get();
        $pendaftaran = \App\Models\Pendaftaran::with('mahasiswa', 'pembimbing1', 'pembimbing2')->find($id);
        $list_dosen = Dosen::with('pembimbing1', 'pembimbing2')->oldest()->paginate(4);
        return view(
            'koordinator.isian-plotting-dosen-pembimbing',
            [
                'title' => 'Plotting P1',
                'name' => 'Galang Setia Nugroho',
                'role' => 'Koordinator',
                'plotting_dosen' => 'Pembimbing',
                'pendaftaran' => $pendaftaran,
                'list_p1' => Pembimbing1::all(),
                'list_p2' => Pembimbing2::all(),
                'list_dosen' => $list_dosen,
                'pendaftarans' => $pendaftarans
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p1Value = request('p1');
        $p2Value = request('p2');

        $pos_p1 = strpos($p1Value, "(");
        $pos_p2 = strpos($p2Value, "(");

        $p1Value = substr($p1Value, 0, $pos_p1 - 1);
        $p2Value = substr($p2Value, 0, $pos_p2 - 1);

        $dosen_id = Dosen::where('name', '=', $p1Value)->get()[0]->id;
        $dosen2_id = Dosen::where('name', '=', $p2Value)->get()[0]->id;


        $p1_id = Pembimbing1::where('dosen_id', $dosen_id)->get()[0]->id;
        $p2_id = Pembimbing2::where('dosen_id', $dosen2_id)->get()[0]->id;

        if (
            \App\Models\Pendaftaran::where('id', $id)->first()->p1_id == null &&
            \App\Models\Pendaftaran::where('id', $id)->first()->p2_id == null
        ) {
            $pendaftaran = \App\Models\Pendaftaran::where('id', $id)->first();
            \App\Models\Pendaftaran::where('id', $id)->update([
                'p1_id' =>  $p1_id,
                'p2_id' => $p2_id
            ]);

            $id_mahasiswa = $pendaftaran->mahasiswa_id;

            \App\Models\Bimbingan::create([
                'mahasiswa_id' => $id_mahasiswa,
                'pembimbing1_id' => $p1_id,
                'pembimbing2_id' => $p2_id
            ]);
        } else {
            $pendaftaran = \App\Models\Pendaftaran::where('id', $id)->first();
            \App\Models\Pendaftaran::where('id', $id)->update([
                'p1_id' =>  $p1_id,
                'p2_id' => $p2_id
            ]);

            $id_mahasiswa = $pendaftaran->mahasiswa_id;

            \App\Models\Bimbingan::where('mahasiswa_id', $id_mahasiswa)->update([
                'pembimbing1_id' => $p1_id,
                'pembimbing2_id' => $p2_id
            ]);
        }
        return redirect('/koordinator/plotting-dosen-pembimbing')->with('success', 'Plotting telah diperbarui!');
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
}