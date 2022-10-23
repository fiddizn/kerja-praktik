<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HasilReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_mahasiswa = \App\Models\Review::with('pendaftaran', 'mahasiswa', 'reviewer1')->oldest()->where('status', '!=', null)->where('hasil_review', '!=', null)->paginate(7);
        return view(
            'koordinator.hasil-review-proposal',
            [
                'title' => 'Hasil Review Proposal',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa
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
        $mahasiswa = \App\Models\Review::with('pendaftaran', 'mahasiswa', 'reviewer1')->where('id', $id)->first();
        return view('koordinator.detail-hasil-review', [
            'title' => 'Detail Hasil Review',
            'role' => 'Koordinator',
            'mahasiswa' => $mahasiswa
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
    public function update($id)
    {
        \App\Models\Review::where('id', $id)->get()->first()->update([
            'rilis' => 1
        ]);
        return redirect()->intended('/koordinator/hasil-review-proposal')->with('success', 'Proposal telah dikirim');
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

    public function downloadProposalReviewed($id)
    {
        $data = Review::where('id', $id)->first();
        if (auth()->user()->role->name == 'Mahasiswa' && $data->rilis != 0) {
            $filepath = public_path("storage/{$data->proposal}");
            if ($data->proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } elseif (auth()->user()->role->name == 'Koordinator') {
            $filepath = public_path("storage/{$data->proposal}");
            if ($data->proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } else return back()->with('null', 'Proposal yang telah direview belum dirilis oleh Koordinator TA 1');
    }
}