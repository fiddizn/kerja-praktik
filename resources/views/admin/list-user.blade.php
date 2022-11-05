@extends('layouts/main')
@section('container')
<h2 class="text-center">{{ $title }}</h2>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex mt-4">
    <div class="me-auto p-2">
        <form action="/admin/kelola-users">
            <div class="input-group" style=" width: 100%;">
                <input type=" text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <div class=" input-group-append">
                    <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" "><i class=" fa-solid
                        fa-magnifying-glass "></i> Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class=" p-2">

                </div>
                <!-- ini print pdf -->
                <div class="p-2">
                    <a class="btn" href="{{ route('exportPdf') }}" role="button" style="background-color:#ff8c1a;">
                        <i class="fa-solid fa-print fa-lg"></i>
                    </a>
                </div>
            </div>

            <table class="table table-hover table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">NO
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">Username
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">Nama
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">Role
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($users as $key=> $user)
                <tbody>
                    <tr>
                        <th scope="row">{{ $users->firstItem()+ $key}}</th>
                        <td>{{ $user->nim }}</td>
                        @if ($user->role->name == 'Dosen')
                        <td>{{ $user->dosen->name }}</td>
                        @elseif ($user->role->name == 'Mahasiswa')
                        <td>{{ $user->mahasiswa->name }}</td>
                        @elseif ($user->role->name == 'TU')
                        <td>{{ $user->tatausaha->name }}</td>
                        @elseif ($user->role->name == 'Admin')
                        <td>{{ $user->admin->name }}</td>
                        @elseif ($user->role->name == 'Koordinator')
                        <td>{{ $user->koordinator->name }}</td>
                        @endif
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <a class="btn" href="#" style="background-color:#ff8c1a;"><i
                                    class="fa-solid fa-align-left"></i> Detail</a>
                            <a class="btn btn-warning" href="#"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                            <form action="#" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" role="button"
                                    onclick="return confirm('Apakah anda yakin?')"><i class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn" href="/admin" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
                </div>
                <div>
                    Showing
                    {{ $users->firstItem() }}
                    to
                    {{ $users->lastItem() }}
                    of
                    {{ $users->total() }}
                    enteries
                </div>
                <div>
                    {{ $users->links() }}
                </div>
                <!-- <div class="position-fixed"
                    style="position:absolute; bottom: 2rem; left: 50%; transform: translate(-50%, -10%);">

                </div> -->
            </div>
            </>
    </div>


    @endsection