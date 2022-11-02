@extends('layouts/main')
@section('container')

<h2 class="text-center">Plotting Dosen Reviewer 2</h2>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex mt-4">
    <div class="me-auto p-2">
        <form action="/koordinator/plotting-dosen-reviewer2">
            <div class="input-group" style=" width: 100%;">
                <input type=" text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <div class=" input-group-append">
                    <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" "><i class=" fa-solid
                        fa-magnifying-glass"></i> Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class=" p-2"></div>
    <div class="p-2">
        <a class="btn" href="#" role="button" style="background-color:#ff8c1a;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer"
                viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path
                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
        </a>
    </div>
</div>

<table class="table table-hover table-sm mt-3">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Peminatan</th>
            <th scope="col">R1</th>
            <th scope="col">R2</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($list_mahasiswa as $key=> $mahasiswa)
    <tbody>
        <tr>
            <th scope="row">{{ $list_mahasiswa->firstItem()+ $key}}</th>
            <td>{{ $mahasiswa->mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->mahasiswa->name }}</td>
            <td>{{ $mahasiswa->peminatan}}</td>
            @if ( $mahasiswa->r1_id != null )
            <td>{{ $mahasiswa->reviewer1->dosen->kode }}</td>
            @else
            <td></td>
            @endif
            @if ( $mahasiswa->r2_id != null )
            <td>{{ $mahasiswa->reviewer2->dosen->kode }}</td>
            @else
            <td></td>
            @endif
            <td>
                <a class="btn" href="/koordinator/plotting-dosen-reviewer2/{{ $mahasiswa->id }}" role="button"
                    style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i>
                    Detail</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

<div class="d-flex justify-content-between">
    <div>
        <a class="btn" href="/koordinator" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
    </div>
    <div>
        Showing
        {{ $list_mahasiswa->firstItem() }}
        to
        {{ $list_mahasiswa->lastItem() }}
        of
        {{ $list_mahasiswa->total() }}
        enteries
    </div>
    <div>
        {{ $list_mahasiswa->links() }}
    </div>
</div>
@endsection