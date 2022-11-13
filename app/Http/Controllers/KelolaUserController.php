<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Koordinator;
use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\TataUsaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('mahasiswa', 'dosen', 'tatausaha', 'admin')->filter(request('search'));
        if ($request->sortBy) {
            if ($request->sortBy == 'nim') {
                $users = $users->orderBy('nim', $request->sortAsc);
            } else if ($request->sortBy == 'role') {
                $users = $users->orderBy(Role::select('name')->whereColumn('roles.id', 'users.role_id'), $request->sortAsc);
            }
        }
        $users = $users->paginate(7)->withQueryString();
        return view('admin.list-user', [
            'title' => 'Kelola Users',
            'role' => 'Admin',
            'users' => $users,
            'sortBy' => $request->sortBy,
            'sortAsc' => $request->sortAsc,
            'search' => $request->search
        ]);
    }

    public function create()
    {
        $role = [
            1 => 'Mahasiswa',
            2 => 'Koordinator',
            3 => 'Dosen',
            4 => 'Admin',
            5 => 'TU'
        ];
        return view('admin.create-user', [
            'title' => 'Kelola Users',
            'role' => 'Admin',
            'roles' => $role
        ]);
    }

    public function store(Request $request)
    {
        if ($request['password'] == $request['confirmpassword']) {

            $validated = $request->validate([
                'nim' => 'required|unique:users',
            ]);

            $user = User::create([
                'nim' => $request['nim'],
                'role_id' => $request['role_id'],
                'password' => Hash::make($request['password'])
            ]);
            $user_id = $user->id;

            if ($request['role_id'] == 1) {
                $mahasiswa = new Mahasiswa();
                $mahasiswa->user_id = $user->id;
                $mahasiswa->name = $request['name'];
                $mahasiswa->nim = $request['nim'];
                $mahasiswa->save();
            } elseif ($request['role_id'] == 2) {
                $koordinator = new Koordinator();
                $koordinator->user_id = $user->id;
                $koordinator->name = $request['name'];
                $koordinator->nid = $request['nim'];
                $koordinator->save();
            } elseif ($request['role_id'] == 4) {
                $admin = new Admin();
                $admin->user_id = $user->id;
                $admin->name = $request['name'];
                $admin->nid = $request['nim'];
                $admin->save();
            } elseif ($request['role_id'] == 5) {
                $tu = new TataUsaha();
                $tu->user_id = $user->id;
                $tu->name = $request['name'];
                $tu->nid = $request['nim'];
                $tu->save();
            }

            return redirect()->intended('/admin/kelola-user')->with('success', 'Data berhasil dibuat!');
        } else {
            return redirect()->back()->with('gagal', 'Konfirmasi Password tidak sesuai!');
        }
    }

    public function show($id)
    {
        $user = User::with('mahasiswa', 'dosen', 'tatausaha', 'admin')->where('id', $id)->first();
        return view('admin.show-user', [
            'title' => 'Detail User',
            'role' => 'Admin',
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $role = [
            1 => 'Mahasiswa',
            2 => 'Koordinator',
            3 => 'Dosen',
            4 => 'Admin',
            5 => 'TU'
        ];
        $user = User::with('mahasiswa', 'dosen', 'tatausaha', 'admin')->where('id', $id)->first();
        return view('admin.edit-user', [
            'title' => 'Update User',
            'role' => 'Admin',
            'user' => $user,
            'roles' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request['password'] == '-' || $request['confirmpassword'] == '-') {
            $validated = $request->validate([
                'nim' => 'required|unique:users',
                'role_id' => 'required'
            ]);

            User::find($id)->update($validated);

            $user = User::find($id);

            if ($user->mahasiswa) {
                Mahasiswa::where('user_id', $id)->first()->update(['name' => $request['name']]);
            } elseif ($user->dosen) {
                Dosen::where('user_id', $id)->first()->update(['name' => $request['name']]);
            } elseif ($user->koordinator) {
                Koordinator::where('user_id', $id)->first()->update(['name' => $request['name']]);
            } elseif ($user->tatausaha) {
                TataUsaha::where('user_id', $id)->first()->update(['name' => $request['name']]);
            } elseif ($user->admin) {
                Admin::where('user_id', $id)->first()->update(['name' => $request['name']]);
            }

            return redirect()->intended('/admin/kelola-user')->with('success', 'Data berhasil diperbarui!');
        } else {
            if ($request['password'] == $request['confirmpassword']) {
                $password = Hash::make($request['password']);
                User::find($id)->update([
                    'password' => $password
                ]);
                return redirect()->intended('/admin/kelola-user')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->back()->with('gagal', 'Konfirmasi Password tidak sesuai!');
            }
        }
    }
    public function deleteUsers(Request $request)
    {
        if (!isset($request['checked'])) {
            return redirect()->back()->with('gagal', 'Anda belum memilih user yang akan dihapus!');
        }
        foreach ($request['checked'] as $item) {
            $user = User::find($item);
            $user->delete();
        }
        return redirect('/admin/kelola-user')->with('success', 'User berhasil dihapus!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/kelola-user')->with('success', 'User berhasil dihapus!');
    }
}