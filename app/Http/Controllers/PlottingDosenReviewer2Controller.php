<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PendaftaranSeminar;
use App\Models\Review;
use App\Models\Reviewer1;
use App\Models\Reviewer2;
use Illuminate\Http\Request;

class PlottingDosenReviewer2Controller extends Controller
{
    public function index()
    {
        $list_mahasiswa = \App\Models\PendaftaranSeminar::with('mahasiswa')->oldest()->paginate(7);
        return view(
            'koordinator.plotting-dosen-reviewer2',
            [
                'title' => 'Plotting Dosen Reviewer 2',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa
            ]
        );
    }

    public function show($id)
    {
        $pendaftarans = \App\Models\PendaftaranSeminar::get();
        $mahasiswa = \App\Models\PendaftaranSeminar::with('mahasiswa')->find($id);
        $list_dosen = \App\Models\Dosen::with('reviewer2')->paginate(4);
        $list_reviewer2 = Reviewer2::get();
        return view(
            'koordinator.isian-plotting-dosen-reviewer2',
            [
                'title' => 'Pendaftaran TA 1',
                'role' => 'Koordinator',
                'plotting_dosen' => 'Reviewer',
                'mahasiswa' => $mahasiswa,
                'list_r2' => $list_reviewer2,
                'list_dosen' => $list_dosen,
                'pendaftarans' => $pendaftarans
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $r2Value = request('r2');

        $pos_r2 = strpos($r2Value, "(");

        $r2Value = substr($r2Value, 0, $pos_r2 - 1);

        $dosen_id = \App\Models\Dosen::where('name', '=', $r2Value)->get()[0]->id;

        $r2_id = Reviewer2::where('dosen_id', $dosen_id)->get()[0]->id;

        \App\Models\PendaftaranSeminar::where('id', $id)->update([
            'r2_id' =>  $r2_id
        ]);

        $mahasiswa_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->mahasiswa_id;
        return redirect('/koordinator/plotting-dosen-reviewer2')->with('success', 'Plotting telah diperbarui!');
    }
}