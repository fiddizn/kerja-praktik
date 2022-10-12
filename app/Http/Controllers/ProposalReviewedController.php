<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use PDO;

class ProposalReviewedController extends Controller
{
    public function index()
    {
        $review = Review::with('mahasiswa')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->first();
        $review_id = Review::with('mahasiswa')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->first()->id;
        return view('mahasiswa.hasil-review', [
            'title' => 'Hasil Review',
            'role' => 'Mahasiswa',
            'review' => $review,
            'review_id' => $review_id
        ]);
    }
}