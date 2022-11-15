<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Review;
use Illuminate\Http\Request;
use PDO;

class ProposalReviewedController extends Controller
{
    public function index()
    {
        $review = Review::with('mahasiswa')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->first();
        $review_id = Review::with('mahasiswa')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->first()->id;
        if (!isset(Pendaftaran::where('mahasiswa_id', auth()->user()->mahasiswa->id)->first()->berkas_ta1)) {
            return redirect('mahasiswa/upload-proposal');
        }
        if ($review->rilis == 0) {
            return redirect()->back()->with('gagal', 'Hasil review belum dirilis!');
        }
        return view('mahasiswa.hasil-review', [
            'title' => 'Hasil Review',
            'role' => 'Mahasiswa',
            'review' => $review,
            'review_id' => $review_id
        ]);
    }

    public function uploadProposal()
    {
        return view('mahasiswa.upload-proposal', [
            'title' => 'Upload Proposal',
            'role' => 'Mahasiswa',
        ]);
    }

    public function storeUploadProposal(Request $request)
    {
        $file = request()->validate(['file' => 'file|mimes:doc,docx,pdf']);
        $file['file'] = request()->file('file')->store('berkas_ta1');

        Pendaftaran::where('mahasiswa_id', auth()->user()->mahasiswa->id)->update([
            'berkas_ta1' => $file['file'],
            'judul_ta1' => $request['judul_ta1']
        ]);
        return redirect('/mahasiswa')->with('success', 'Proposal berhasil diunggah!');
    }
}