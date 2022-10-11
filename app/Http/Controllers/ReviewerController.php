<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dosen.reviewer.index', [
            'title' => 'Home',
            'role' => 'Reviewer 1'
        ]);
    }

    public function showReviewProposal()
    {

        $list_review = \App\Models\Review::with('pendaftaran')->oldest()->paginate(7);
        return view('dosen.reviewer.review-proposal', [
            'title' => 'Review Proposal',
            'role' => 'Reviewer 1',
            'list_review' => $list_review
        ]);
    }

    public function showFormReview($id)
    {
        $review = \App\Models\Review::with('pendaftaran', 'mahasiswa')->find($id);
        return view('dosen.reviewer.form-review', [
            'title' => 'Form Review',
            'role' => 'Reviewer 1',
            'review' => $review,
            'status' => $review->status
        ]);
    }

    public function createFormReview($id)
    {
        $file = request()->validate([
            'proposal' => 'file|max:50000|mimes:doc,docx,pdf,ppt,pptx'
        ]);

        $file['proposal'] = request()->file('proposal')->store('proposal_reviewed');

        if (request('penilaian6') != null) {

            // kondisi merubah penilaian jadi 1,2,3
            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));
            $penilaian6 = Self::convertPenilaianToInt(request('penilaian6'));

            \App\Models\Review::where('id', $id)->update([
                'penilaian1' => $penilaian1,
                'penilaian2' => $penilaian2,
                'penilaian3' => $penilaian3,
                'penilaian4' => $penilaian4,
                'penilaian5' => $penilaian5,
                'penilaian6' => $penilaian6,

                'hasil_review' => request('hasil_review'),
                'komentar' => request('komentar'),
                'proposal' => $file['proposal'],
                'status' => 1
            ]);
            return redirect('/dosen/reviewer-1/review-proposal/')->with('success', 'Review telah ditambahkan!');
        } else {

            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));

            \App\Models\Review::where('id', $id)->update([
                'penilaian1' => $penilaian1,
                'penilaian2' => $penilaian2,
                'penilaian3' => $penilaian3,
                'penilaian4' => $penilaian4,
                'penilaian5' => $penilaian5,

                'hasil_review' => request('hasil_review'),
                'komentar' => request('komentar'),
                'proposal' => request('proposal'),
                'status' => 1
            ]);
            return redirect('/dosen/reviewer-1/review-proposal/')->with('success', 'Review telah ditambahkan!');
        }
    }

    public function convertPenilaianToInt($penilaian)
    {
        if ($penilaian == 'Baik') {
            return 3;
        } elseif ($penilaian == 'Cukup') {
            return 2;
        } else {
            return 1;
        }
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
        //
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
    public function update(Request $request, $id)
    {
        //
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