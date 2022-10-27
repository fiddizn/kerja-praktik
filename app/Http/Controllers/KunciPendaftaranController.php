<?php

namespace App\Http\Controllers;

use App\Models\KunciPendaftaran;
use Illuminate\Http\Request;

class KunciPendaftaranController extends Controller
{
    public function lockAdministrasi(Request $request)
    {
        KunciPendaftaran::first()->update([
            'administrasi' => $request['administrasi']
        ]);
        return redirect()->back()->with('success', 'Pendaftaran Administrasi telah dikunci!');
    }

    public function unlockAdministrasi(Request $request)
    {
        KunciPendaftaran::first()->update([
            'administrasi' => $request['administrasi']
        ]);
        return redirect()->back()->with('success', 'Pendaftaran Administrasi telah dibuka!');
    }

    public function lockSeminar(Request $request)
    {
        KunciPendaftaran::first()->update([
            'seminar' => $request['seminar']
        ]);
        return redirect()->back()->with('success', 'Pendaftaran Seminar telah dikunci!');
    }

    public function unlockSeminar(Request $request)
    {
        KunciPendaftaran::first()->update([
            'seminar' => $request['seminar']
        ]);
        return redirect()->back()->with('success', 'Pendaftaran Administrasi telah dibuka!');
    }
}