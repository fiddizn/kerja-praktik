<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PendaftaranSeminar;
use App\Models\PenilaianSeminar;
use App\Models\Review;
use App\Models\Reviewer1;
use App\Models\Reviewer2;
use Illuminate\Http\Request;

class PlottingDosenReviewer2Controller extends Controller
{
    public function index()
    {
        $list_mahasiswa = \App\Models\PendaftaranSeminar::with([
            "reviewer2" => function ($q) {
                $q->with("dosen");
            },
            "mahasiswa"
        ])->where('r1_id', '!=', null)->where('status', 'Lolos')->orWhere('status', 'Lolos Bersyarat')
            ->oldest()->filterR2(request('search'))->paginate(7)->withQueryString();
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
        $mahasiswa_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->mahasiswa_id;

        $r2Value = request('r2');
        $pos_r2 = strpos($r2Value, "(");
        $r2Value = substr($r2Value, 0, $pos_r2 - 1);


        $dosen_id = \App\Models\Dosen::where('name', '=', $r2Value)->get()[0]->id;

        $r2_id = Reviewer2::where('dosen_id', $dosen_id)->get()[0]->id;

        if (Reviewer2::where('id', $r2_id)->first()->dosen->name == PendaftaranSeminar::where('mahasiswa_id', $mahasiswa_id)->first()->reviewer1->dosen->name) {
            return redirect()->back()->with('gagal', 'Reviwer 2 tidak boleh sama dengan Reviewer 1!');
        }
        PendaftaranSeminar::where('id', $id)->update([
            'r2_id' =>  $r2_id
        ]);

        $r1_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->r1_id;
        $p1_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p1_id;
        $p2_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p2_id;

        if (PenilaianSeminar::where('mahasiswa_id', $mahasiswa_id)->first() == null) {
            PenilaianSeminar::create([
                'mahasiswa_id' => $mahasiswa_id,
                'pembimbing1_id' => $p1_id,
                'pembimbing2_id' => $p2_id,
                'reviewer1_id' => $r1_id,
                'reviewer2_id' => $r2_id
            ]);
        } else {
            PenilaianSeminar::where('mahasiswa_id', $mahasiswa_id)->update([
                'reviewer2_id' => $r2_id
            ]);
        }

        return redirect('/koordinator/plotting-dosen-reviewer2')->with('success', 'Plotting telah diperbarui!');
    }
}