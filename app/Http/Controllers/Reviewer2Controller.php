<?php

namespace App\Http\Controllers;

use App\Models\PenilaianSeminar;
use Illuminate\Http\Request;

class Reviewer2Controller extends Controller
{
    public function index()
    {
        if (auth()->user()->reviewer2 && PenilaianSeminar::where('reviewer2_id', auth()->user()->reviewer2->id)->count() <= 0) {
            return redirect()->back()->with('gagal', 'Maaf, anda tidak terdaftar sebagai Reviewer 2');
        }
        return view('dosen.reviewer.index', [
            'title' => 'Home',
            'role' => 'Reviewer 2'
        ]);
    }
}