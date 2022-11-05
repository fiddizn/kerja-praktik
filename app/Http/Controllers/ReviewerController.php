<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        if (auth()->user()->reviewer1 && Review::where('r1_id', auth()->user()->reviewer1->id)->count() > 0) {
            return view('dosen.reviewer.index', [
                'title' => 'Home',
                'role' => 'Reviewer 1'
            ]);
        } else {
            return redirect()->back()->with('gagal', 'Maaf, anda tidak terdaftar sebagai Reviewer 1');
        }
    }

    public function showReviewProposal()
    {

        $list_review = \App\Models\Review::with('pendaftaran')->where('r1_id', auth()->user()->reviewer1->id)->whereHas('pendaftaran', function ($query) {
            return $query->where('berkas_ta1', '!=', null);
        })->oldest()->filterReviewProposal(request('search'))->paginate(7)->withQueryString();
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

        $file['proposal'] = request()->file('proposal')->store('proposal_reviewed_r1');

        if (request('penilaian6') != null) {

            // kondisi merubah penilaian jadi 1,2,3
            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));
            $penilaian6 = Self::convertPenilaianToInt(request('penilaian6'));

            \App\Models\Review::where('id', $id)->update([
                'r1_penilaian1' => $penilaian1,
                'r1_penilaian2' => $penilaian2,
                'r1_penilaian3' => $penilaian3,
                'r1_penilaian4' => $penilaian4,
                'r1_penilaian5' => $penilaian5,
                'r1_penilaian6' => $penilaian6,

                'r1_hasil_review' => request('hasil_review'),
                'r1_komentar' => request('komentar'),
                'r1_proposal' => $file['proposal'],
                'r1_status' => 1
            ]);
            return redirect('/dosen/reviewer-1/review-proposal/')->with('success', 'Review telah ditambahkan!');
        } else {

            $file = request()->validate([
                'proposal' => 'file|max:50000|mimes:doc,docx,pdf,ppt,pptx'
            ]);

            $file['proposal'] = request()->file('proposal')->store('proposal_reviewed_r1');

            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));

            \App\Models\Review::where('id', $id)->update([
                'r1_penilaian1' => $penilaian1,
                'r1_penilaian2' => $penilaian2,
                'r1_penilaian3' => $penilaian3,
                'r1_penilaian4' => $penilaian4,
                'r1_penilaian5' => $penilaian5,

                'r1_hasil_review' => request('hasil_review'),
                'r1_komentar' => request('komentar'),
                'r1_proposal' => $file['proposal'],
                'r1_status' => 1
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
}