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
        <form action="/koordinator/list-pendaftaran-ta-1">
            <div class="input-group" style=" width: 100%;">
                <input type=" text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <input type="text" name="sortBy" value="{{ $sortBy }}" style="display:none">
                <input type="text" name="sortAsc" value="{{ $sortAsc }}" style="display:none">
                <div class=" input-group-append">
                    <button class="btn ms-3" type="submit" style="background-color:#ff8c1a;" "><i class=" fa-solid
                        fa-magnifying-glass "></i> Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class=" p-2">
                        @if ($kuncipendaftaran->administrasi == 0)
                        <form action="{{ route('lockAdministrasi')}}" method="post"> <button class="btn" type="submit"
                                style="background-color:#ff8c1a;">
                                @csrf
                                <input type="hidden" name="administrasi" value=1>
                                <i class="fa-solid fa-unlock fa-lg"></i>
                            </button>
                        </form>
                        @else
                        <form action="{{ route('unlockAdministrasi')}}" method="post"> <button class="btn" type="submit"
                                style="background-color:#ff8c1a;">
                                @csrf
                                <input type="hidden" name="administrasi" value=0>
                                <i class="fa-solid fa-lock fa-lg"></i>
                            </button>
                        </form>
                        @endif
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
                        </th>
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
                                    <i class="fa-solid fa-arrow-up fa-xs"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                                </span>
                            </a>
                            @elseif ($sortAsc == 'DESC' && $sortBy == 'name')
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=name&sortAsc={{$sortAsc=='ASC'&&$sortBy=='name'?'DESC':'ASC'}}">
                                <span wire:click="sortBy('name')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs"></i>
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
                                <span wire:click="sortBy('peminatan')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                                </span>
                            </a>
                            @elseif ($sortAsc == 'ASC' && $sortBy == 'peminatan')
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=peminatan&sortAsc={{$sortAsc=='ASC'&&$sortBy=='peminatan'?'DESC':'ASC'}}">
                                <span wire:click="sortBy('peminatan')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs"></i>
                                </span>
                            </a>
                            @else
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=peminatan&sortAsc={{$sortAsc=='ASC'&&$sortBy=='peminatan'?'DESC':'ASC'}}">
                                <span wire:click="sortBy('peminatan')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                                </span>
                            </a>
                            @endif
                        </th>
                        <th scope="col">Status
                            @if ($sortAsc == 'ASC' && $sortBy == 'status')
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=status&sortAsc={{$sortAsc=='ASC'&&$sortBy=='status'?'DESC':'ASC'}}">
                                <span wire:click="sortBy('name')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                                </span>
                            </a>
                            @elseif ($sortAsc == 'DESC' && $sortBy == 'status')
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=status&sortAsc={{$sortAsc=='ASC'&&$sortBy=='status'?'DESC':'ASC'}}">
                                <span wire:click="sortBy('name')" style="cursor: pointer;">
                                    <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                    <i class="fa-solid fa-arrow-down fa-xs"></i>
                                </span>
                            </a>
                            @else
                            <a
                                href="{{request()->getPathInfo()}}?search={{$search}}&sortBy=status&sortAsc={{$sortAsc=='ASC'&&$sortBy=='status'?'DESC':'ASC'}}">
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
                @foreach ($list_pendaftaran as $key=> $pendaftaran)
                <tbody>
                    <tr>
                        <th scope="row">{{ $list_pendaftaran->firstItem()+ $key}}</th>
                        <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                        <td>{{ $pendaftaran->mahasiswa->name }}</td>
                        <td>{{ $pendaftaran->peminatan }}</td>
                        <td><button type="submit" class="btn
                            {{($pendaftaran->status == 'Lolos' ) ? 'btn-success' : '';}}
                            {{($pendaftaran->status == 'Lolos Bersyarat' ) ? 'btn-warning' : '';}}
                            {{($pendaftaran->status == 'Pending' ) ? 'btn-danger' : '';}}
                            {{($pendaftaran->status == 'Tidak Lolos' ) ? 'btn-secondary' : '';}}
                            " style="width: 9rem; cursor:default; ">{{ $pendaftaran->status }}</button>
                        </td>
                        <td>
                            <a class="btn" href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}"
                                style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i> Detail</a>
                            <!-- <a class="btn btn-warning"
                                href="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}/edit"><i
                                    class="fa-regular fa-pen-to-square"></i> Edit</a>
                            <form action="/koordinator/list-pendaftaran-ta-1/{{ $pendaftaran->id }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" role="button"
                                    onclick="return confirm('Apakah anda yakin?')"><i class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </form> -->
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn" href="/koordinator" role="button"
                        style="background-color:#ff8c1a; width: 6rem;">Back</a>
                </div>
                <div>
                    Showing
                    {{ $list_pendaftaran->firstItem() }}
                    to
                    {{ $list_pendaftaran->lastItem() }}
                    of
                    {{ $list_pendaftaran->total() }}
                    enteries
                </div>
                <div>
                    {{ $list_pendaftaran->links() }}
                </div>
                <!-- <div class="position-fixed"
                    style="position:absolute; bottom: 2rem; left: 50%; transform: translate(-50%, -10%);">

                </div> -->
            </div>
            </>
    </div>


    @endsection