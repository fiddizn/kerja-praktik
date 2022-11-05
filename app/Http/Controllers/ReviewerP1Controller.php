<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewerP1Controller extends Controller
{
    public function index()
    {
        $list_review = \App\Models\Review::with('pendaftaran', 'mahasiswa')->where('p1_id', auth()->user()->pembimbing1->id)->whereHas('pendaftaran', function ($query) {
            return $query->where('berkas_ta1', '!=', null);
        })->oldest()->filterReviewProposal(request('search'))->paginate(7)->withQueryString();
        return view('dosen.pembimbing.review-proposal', [
            'title' => 'Review Proposal',
            'role' => 'Pembimbing 1',
            'list_review' => $list_review
        ]);
    }

    public function showFormReview($id)
    {
        $review = \App\Models\Review::with('pendaftaran', 'mahasiswa')->find($id);
        return view('dosen.pembimbing.form-review', [
            'title' => 'Form Review',
            'role' => 'Pembimbing 1',
            'review' => $review,
            'status' => $review->status
        ]);
    }

    public function createFormReview($id)
    {
        $file = request()->validate([
            'proposal' => 'file|max:50000|mimes:doc,docx,pdf,ppt,pptx'
        ]);

        $file['proposal'] = request()->file('proposal')->store('proposal_reviewed_p1');

        if (request('penilaian6') != null) {

            // kondisi merubah penilaian jadi 1,2,3
            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));
            $penilaian6 = Self::convertPenilaianToInt(request('penilaian6'));

            Review::where('id', $id)->update([
                'p1_penilaian1' => $penilaian1,
                'p1_penilaian2' => $penilaian2,
                'p1_penilaian3' => $penilaian3,
                'p1_penilaian4' => $penilaian4,
                'p1_penilaian5' => $penilaian5,
                'p1_penilaian6' => $penilaian6,

                'p1_hasil_review' => request('hasil_review'),
                'p1_komentar' => request('komentar'),
                'p1_proposal' => $file['proposal'],
                'p1_status' => 1
            ]);
            return redirect('/dosen/pembimbing-1/review-proposal')->with('success', 'Review telah ditambahkan!');
        } else {

            $file = request()->validate([
                'proposal' => 'file|max:50000|mimes:doc,docx,pdf,ppt,pptx'
            ]);

            $file['proposal'] = request()->file('proposal')->store('proposal_reviewed_p1');

            $penilaian1 = Self::convertPenilaianToInt(request('penilaian1'));
            $penilaian2 = Self::convertPenilaianToInt(request('penilaian2'));
            $penilaian3 = Self::convertPenilaianToInt(request('penilaian3'));
            $penilaian4 = Self::convertPenilaianToInt(request('penilaian4'));
            $penilaian5 = Self::convertPenilaianToInt(request('penilaian5'));

            \App\Models\Review::where('id', $id)->update([
                'p1_penilaian1' => $penilaian1,
                'p1_penilaian2' => $penilaian2,
                'p1_penilaian3' => $penilaian3,
                'p1_penilaian4' => $penilaian4,
                'p1_penilaian5' => $penilaian5,

                'p1_hasil_review' => request('hasil_review'),
                'p1_komentar' => request('komentar'),
                'p1_proposal' => $file['proposal'],
                'p1_status' => 1
            ]);
            return redirect('/dosen/pembimbing-1/review-proposal')->with('success', 'Review telah ditambahkan!');
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