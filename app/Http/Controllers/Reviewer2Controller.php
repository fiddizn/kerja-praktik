<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reviewer2Controller extends Controller
{
    public function index()
    {
        return view('dosen.reviewer.index', [
            'title' => 'Home',
            'role' => 'Reviewer 2'
        ]);
    }
}