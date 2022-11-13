@extends('layouts/main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('gagal'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h2 class="text-center">{{ $title }}</h2>

<div class="d-flex mt-4">
    <div class="me-auto py-2">
        <button class="btn" type="submit" style="background-color:#ff8c1a; width:9rem;" form="formRilis"
            onclick="return confirm('Apakah anda yakin ingin merilis hasil review?')"><i
                class="fa-solid fa-file-export"></i>
            Rilis</button>
    </div>
    <div class="auto p-2">
        <form action="/koordinator/penilaian-seminar">
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
            <th scope="col">NIM
                @if ($sortAsc == 'ASC' && $sortBy == 'nim')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=nim&sortAsc={{$sortAsc=='ASC'&&$sortBy=='nim'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs "></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @elseif ($sortAsc == 'DESC' && $sortBy == 'nim')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=nim&sortAsc={{$sortAsc=='ASC'&&$sortBy=='nim'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs "></i>
                    </span>
                </a>
                @else
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=nim&sortAsc={{$sortAsc=='ASC'&&$sortBy=='nim'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @endif
            </th>
            <th scope="col">Nama
                @if ($sortAsc == 'ASC' && $sortBy == 'name')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=name&sortAsc={{$sortAsc=='ASC'&&$sortBy=='name'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs "></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @elseif ($sortAsc == 'DESC' && $sortBy == 'name')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=name&sortAsc={{$sortAsc=='ASC'&&$sortBy=='name'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs "></i>
                    </span>
                </a>
                @else
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=name&sortAsc={{$sortAsc=='ASC'&&$sortBy=='name'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @endif
            </th>
            <th scope="col">Peminatan
                @if ($sortAsc == 'ASC' && $sortBy == 'peminatan')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=peminatan&sortAsc={{$sortAsc=='ASC'&&$sortBy=='peminatan'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs "></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @elseif ($sortAsc == 'DESC' && $sortBy == 'peminatan')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=peminatan&sortAsc={{$sortAsc=='ASC'&&$sortBy=='peminatan'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs "></i>
                    </span>
                </a>
                @else
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=peminatan&sortAsc={{$sortAsc=='ASC'&&$sortBy=='peminatan'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @endif
            </th>
            <th scope="col">Rilis
                @if ($sortAsc == 'ASC' && $sortBy == 'rilis')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=rilis&sortAsc={{$sortAsc=='ASC'&&$sortBy=='rilis'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs "></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @elseif ($sortAsc == 'DESC' && $sortBy == 'rilis')
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=rilis&sortAsc={{$sortAsc=='ASC'&&$sortBy=='rilis'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs "></i>
                    </span>
                </a>
                @else
                <a
                    href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=rilis&sortAsc={{$sortAsc=='ASC'&&$sortBy=='rilis'?'DESC':'ASC'}}">
                    <span wire:click="sortBy('name')" style="cursor: pointer;">
                        <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                        <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                    </span>
                </a>
                @endif
            </th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <form class="d-inline" id="formRilis" action="/koordinator/penilaian-seminar/rilis" method="post">
        @csrf
        @foreach ($penilaianseminars as $key=> $penilaianseminar)
        <tbody>
            <tr>
                <th scope="row">
                    <div class="form-check d-inline">
                        <input class="form-check-input" type="checkbox" name="checked[]"
                            value="{{$penilaianseminar->id}}" id="flexCheckDefault">
                    </div>
                    {{ $penilaianseminars->firstItem()+ $key}}
                </th>
                <td>{{ $penilaianseminar->mahasiswa->nim }}</td>
                <td>{{ $penilaianseminar->mahasiswa->name }}</td>
                <td>{{ $penilaianseminar->mahasiswa->pendaftaran->peminatan }}</td>
                @if ($penilaianseminar->rilis)
                <td><i class="fa-solid fa-check"></i></td>
                @else
                <td></td>
                @endif
                <td>
                    @if (!$penilaianseminar->rilis)
                    <input type="hidden" id="rilis" name="rilis" value=1>
                    <a class="btn" href="/koordinator/penilaian-seminar/rilis-{{$penilaianseminar->id}}"
                        style="background-color:#ff8c1a;"><i class="fa-solid fa-file-export"></i>
                        Rilis</a>
                    @else
                    <input type="hidden" id="rilis" name="rilis" value=0>
                    <a class="btn" href="/koordinator/penilaian-seminar/reset-{{$penilaianseminar->id}}"
                        style="background-color:#ff8c1a;"><i class="fa-solid fa-rotate-left"></i>
                        Tarik</a>
                    @endif

                    <a class="btn" href="/koordinator/penilaian-seminar/{{ $penilaianseminar->id }}" role="button"
                        style="background-color:#ff8c1a;"><i class="fa-solid fa-circle-info"></i>
                        Detail</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </form>
</table>

<div class="d-flex justify-content-between">
    <div>
        <a class="btn" href="/koordinator" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
    </div>
    <div>
        Showing
        {{ $penilaianseminars->firstItem() }}
        to
        {{ $penilaianseminars->lastItem() }}
        of
        {{ $penilaianseminars->total() }}
        enteries
    </div>
    <div>
        {{ $penilaianseminars->links() }}
    </div>
</div>
@endsection