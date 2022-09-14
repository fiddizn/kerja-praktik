@extends('layouts/main')
@section('container')

<h2 style="text-align:center;">List Pendaftaran TA 1</h2>

<div class="d-flex mt-4">
    <div class="me-auto p-2">
        <div class="input-group " style=" width: 400px;">
            <input type=" text" class="form-control">
            <div class="input-group-append">
                <button class="btn ms-3" style="background-color:#ff8c1a;">Search</button>
            </div>
        </div>
    </div>
    <div class="p-2">
        <a class="btn" href="#" role="button" style="background-color:#ff8c1a;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" fill="currentColor" class="bi bi-lock-fill"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
            </svg>
        </a>
    </div>
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

<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Peminatan</th>
            <th scope="col">Judul</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @foreach ($pendaftarans as $pendaftaran)
    <tbody>
        <tr>
            <th scope="row">{{ $pendaftaran->id }}</th>
            <td>{{ $pendaftaran->nim }}</td>
            <td>{{ $pendaftaran->mahasiswa->name }}</td>
            <td>{{ $pendaftaran->peminatan }}</td>
            <td>{{ $pendaftaran->judul_ta1 }}</td>
            <td><button type="submit" class="btn
              
                {{($pendaftaran->status == 'Lolos' ) ? 'btn-success' : '';}}
                {{($pendaftaran->status == 'Lolos Bersyarat' ) ? 'btn-warning' : '';}}
                {{($pendaftaran->status == 'Pending' ) ? 'btn-danger' : '';}}
                {{($pendaftaran->status == 'Tidak Lolos' ) ? 'btn-secondary' : '';}}
            " style="width: 9rem; ">{{ $pendaftaran->status }}</button>
            </td>
            <td>
                <a class="btn" href="/koordinator/list-pendaftaran-ta-1/detail-mahasiswa-{{ $pendaftaran->id }}"
                    role="button" style="background-color:#ff8c1a;">Detail</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="col-12 my-5">
    <a class="btn " href="/koordinator" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>
@endsection