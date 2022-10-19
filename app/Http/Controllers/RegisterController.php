<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register', [
            'title' => 'Register',
            'name' => NULL
        ]);
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
        $validatedDataLogin = $request->validate([
            'nim' => 'required|unique:users|digits:10',
            'password' => 'min:5|max:255',
            'password2' => 'min:5|max:255',
            'role_id' => 'required'
        ]);
        if ($validatedDataLogin['password'] == $validatedDataLogin['password2']) {
            $validatedDataLogin['password'] = Hash::make($validatedDataLogin['password']);

            $user = User::create($validatedDataLogin);

            $current_id = $user->id;

            Mahasiswa::create([
                'user_id' => $current_id,
                'nim' => request('nim'),
                'name' => request('name')
            ]);

            return redirect('/')->with('success', 'Registrasi suskes! Silakan login.');
        }
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