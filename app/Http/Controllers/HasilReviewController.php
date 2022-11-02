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
        $list_mahasiswa = \App\Models\Review::with('pendaftaran', 'mahasiswa', 'reviewer1')->oldest()->where('status', '!=', null)->where('hasil_review', '!=', null)
            ->filter(request('search'))->paginate(7)->withQueryString();
        return view(
            'koordinator.hasil-review-proposal',
            [
                'title' => 'Hasil Review Proposal',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa
            ]
        );
    }

    public function show($id)
    {
        $nilai = [1 => 'Kurang', 2 => 'Cukup', 3 => 'Baik'];
        $mahasiswa = \App\Models\Review::with('pendaftaran', 'mahasiswa', 'reviewer1')->where('id', $id)->first();
        return view('koordinator.detail-hasil-review', [
            'title' => 'Detail Hasil Review',
            'role' => 'Koordinator',
            'mahasiswa' => $mahasiswa,
            'nilai' => $nilai
        ]);
    }

    public function update($id)
    {
        \App\Models\Review::where('id', $id)->get()->first()->update([
            'rilis' => 1
        ]);
        return redirect()->intended('/koordinator/hasil-review-proposal')->with('success', 'Proposal telah dikirim');
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