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
        <form action="/tu/pendaftaran-administrasi">
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
                        <th scope="col">NIM
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
                        <th scope="col">Peminatan
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">Status
                            <span wire:click="sortBy('name')" class="float-right" style="cursor: pointer;">
                                <i class="fa-solid fa-arrow-up fa-xs text-muted"></i>
                                <i class="fa-solid fa-arrow-down fa-xs text-muted"></i>
                            </span>
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
                            <a class="btn" href="{{ route('pendaftaran-administrasi.show',$pendaftaran->id) }}"
                                style="background-color:#ff8c1a;"><i class="fa-solid fa-align-left"></i> Detail</a>
                            <!-- <a class="btn btn-warning"
                                href="{{ route('pendaftaran-administrasi.edit',$pendaftaran->id) }}"><i
                                    class="fa-regular fa-pen-to-square"></i> Edit</a> -->
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn" href="/tu" role="button" style="background-color:#ff8c1a; width: 6rem;">Back</a>
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