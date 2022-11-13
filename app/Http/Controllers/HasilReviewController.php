<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pembimbing1;
use App\Models\Pendaftaran;
use App\Models\Review;
use App\Models\Reviewer1;
use Illuminate\Http\Request;

class HasilReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_mahasiswa = \App\Models\Review::with('pendaftaran', 'mahasiswa', 'reviewer1', 'pembimbing1')->where('p1_status', '=', 1)->where('r1_status', '=', 1)
            ->filter(request('search'));

        $sortBy = $request->sortBy;
        $sortAsc = $request->sortAsc;
        if ($sortBy) {
            if ($request->sortBy == 'r1') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Reviewer1::select('id')->whereColumn('reviewer1s.id', 'reviews.r1_id'), $sortAsc);
            } elseif ($request->sortBy == 'p1') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Pembimbing1::select('id')->whereColumn('pembimbing1s.id', 'reviews.p1_id'), $sortAsc);
            } else if ($request->sortBy == 'peminatan') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Pendaftaran::select('id')->whereColumn('pendaftarans.id', 'reviews.pendaftaran_id'), $sortAsc);
            } else {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Mahasiswa::select($request->sortBy)->whereColumn('mahasiswas.id', 'reviews.mahasiswa_id'), $request->sortAsc);
            }
        }

        $list_mahasiswa = $list_mahasiswa->paginate(7)->withQueryString();
        return view(
            'koordinator.hasil-review-proposal',
            [
                'title' => 'Hasil Review Proposal',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa,
                'sortBy' => $request->sortBy,
                'sortAsc' => $request->sortAsc,
                'search' => $request->search
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

    public function rilis($id)
    {
        \App\Models\Review::where('id', $id)->get()->first()->update([
            'rilis' => 1
        ]);
        return redirect()->intended('/koordinator/hasil-review-proposal')->with('success', 'Proposal telah dikirim');
    }

    public function rilisBeberapa(Request $request)
    {
        if (!isset($request['checked'])) {
            return redirect()->back()->with('gagal', 'Anda belum memilih hasil review yang akan dirilis!');
        } else {
            foreach ($request['checked'] as $item) {
                $review = Review::find($item);
                $review->update([
                    'rilis' => 1
                ]);
            }
            return redirect()->intended('/koordinator/hasil-review-proposal')->with('success', 'Hasil review telah dirilis!');
        }
    }

    public function downloadProposalReviewedP1($id)
    {
        $data = Review::where('id', $id)->first();
        if (auth()->user()->role->name == 'Mahasiswa' && $data->rilis != 0) {
            $filepath = public_path("storage/{$data->p1_proposal}");
            if ($data->p1_proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } elseif (auth()->user()->role->name == 'Koordinator') {
            $filepath = public_path("storage/{$data->p1_proposal}");
            if ($data->p1_proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } else return back()->with('null', 'Proposal yang telah direview belum dirilis oleh Koordinator TA 1');
    }

    public function downloadProposalReviewedR1($id)
    {
        $data = Review::where('id', $id)->first();
        if (auth()->user()->role->name == 'Mahasiswa' && $data->rilis != 0) {
            $filepath = public_path("storage/{$data->r1_proposal}");
            if ($data->r1_proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } elseif (auth()->user()->role->name == 'Koordinator') {
            $filepath = public_path("storage/{$data->r1_proposal}");
            if ($data->r1_proposal == null) {
                return back()->with('null', 'File tidak ada!');
            } else {
                return response()->download($filepath);
            }
        } else return back()->with('null', 'Proposal yang telah direview belum dirilis oleh Koordinator TA 1');
    }
}