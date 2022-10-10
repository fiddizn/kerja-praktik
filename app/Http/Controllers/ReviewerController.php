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
        \App\Models\Review::where('id', $id)->update([
            // 'p1_id' =>  $p1_id,
            // 'p2_id' => $p2_id
        ]);
        return redirect('/koordinator/plotting-dosen-pembimbing')->with('success', 'Plotting telah diperbarui!');
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