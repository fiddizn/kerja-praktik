<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\Reviewer1;
use Illuminate\Http\Request;

class PlottingDosenReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *scopeFilterR1
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_mahasiswa = \App\Models\Pendaftaran::with([
            "reviewer1" => function ($q) {
                $q->with("dosen");
            },
            "mahasiswa"
        ])->whereHas('mahasiswa', function ($query) {
            $query->where('p1_id', '!=', null)->where('p2_id', '!=', null);
        })->filterR1(request('search'));
        $sortBy = $request->sortBy;
        $sortAsc = $request->sortAsc;
        if ($sortBy) {
            if ($request->sortBy == 'r1') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Reviewer1::select('id')->whereColumn('reviewer1s.id', 'pendaftarans.r1_id'), $sortAsc);
            } else {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Mahasiswa::select($request->sortBy)->whereColumn('mahasiswas.id', 'pendaftarans.mahasiswa_id'), $request->sortAsc);
            }
        }
        $list_mahasiswa = $list_mahasiswa->paginate(7)->withQueryString();
        return view(
            'koordinator.plotting-dosen-reviewer',
            [
                'title' => 'Plotting Dosen Reviewer',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa,
                'sortBy' => $request->sortBy,
                'sortAsc' => $request->sortAsc,
                'search' => $request->search
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftarans = \App\Models\Pendaftaran::get();
        $mahasiswa = \App\Models\Pendaftaran::with('mahasiswa')->find($id);
        $list_dosen = \App\Models\Dosen::with('reviewer1')->paginate(4);
        $list_reviewer1 = Reviewer1::get();
        return view(
            'koordinator.isian-plotting-dosen-reviewer',
            [
                'title' => 'Pendaftaran TA 1',
                'role' => 'Koordinator',
                'plotting_dosen' => 'Reviewer',
                'mahasiswa' => $mahasiswa,
                'list_r1' => $list_reviewer1,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $r1Value = request('r1');

        $pos_r1 = strpos($r1Value, "(");

        $r1Value = substr($r1Value, 0, $pos_r1 - 1);

        $dosen_id = \App\Models\Dosen::where('name', '=', $r1Value)->get()[0]->id;

        $r1_id = Reviewer1::where('dosen_id', $dosen_id)->get()[0]->id;

        \App\Models\Pendaftaran::where('id', $id)->update([
            'r1_id' =>  $r1_id
        ]);

        $mahasiswa_id = Pendaftaran::where('id', '=', $id)->get()[0]->mahasiswa_id;
        $p1_id = Pendaftaran::where('id', '=', $id)->get()[0]->p1_id;

        \App\Models\Review::where('mahasiswa_id', $mahasiswa_id)->update([
            'r1_id' =>  $r1_id,
            'p1_id' => $p1_id
        ]);
        return redirect('/koordinator/plotting-dosen-reviewer')->with('success', 'Plotting telah diperbarui!');
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