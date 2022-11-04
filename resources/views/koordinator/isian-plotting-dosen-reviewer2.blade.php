@extends('layouts/main')
@section('container')
@if(session()->has('gagal'))
<div class="alert alert-warning  alert-dismissible fade show mt-3" role="alert">
    {{ session('gagal') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2 class="text-center">Plotting Dosen Reviewer 2</h2>

<div class="row align-items-start">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" readonly
                value="{{ $mahasiswa->mahasiswa->nim }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="name" readonly
                value="{{ $mahasiswa->mahasiswa->name }}" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="/koordinator/plotting-dosen-reviewer2/{{ $mahasiswa->id }}" method="post" id="plotting">
            @method('put')
            @csrf
            <div class="row mt-5">
                <label for=" r1" class="col-sm-3 col-form-label">Reviewer 1</label>
                <div class="col">
                    <input type="text" class="form-control" name="r1" id="r1" readonly
                        value="{{ $mahasiswa->reviewer1->dosen->name }}" disabled>
                </div>
            </div>
            <div class="row mt-5">
                <label for=" r2" class="col-sm-3 col-form-label">Reviewer 2</label>
                <div class="col">
                    <select type="text" class="form-select" name="r2" id="r2">
                        <option selected disabled>Pilih...</option>
                        @foreach ($list_r2 as $r2)
                        <option>{{ $r2->dosen->name }} ({{ $r2->dosen->jabfung->name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <table class="table table-hover mt-3" style="min-height: 210px;">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">R2</th>
                </tr>
            </thead>
            @foreach ($list_dosen as $key=> $dosen)
            <tbody>
                <tr>
                    <th scope="row">{{$list_dosen->firstItem()+ $key}}</th>
                    <td>{{ $dosen->name }}</td>
                    <td>{{ $dosen->jabfung->name }}</td>
                    @if($dosen->reviewer2 != null)
                    <td>{{ $pendaftarans->where('r2_id',$dosen->reviewer2->id)->count() }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $list_dosen->links() }}
    </div>
</div>
<div class="row mt-2">
    <a class="btn" href="/koordinator/plotting-dosen-reviewer2" role="button"
        style="width: 5rem;background-color:#ff8c1a;">Back</a>
    <button form="plotting" type="submit" class="btn ms-3" style="width: 5rem;background-color:#ff8c1a;">Sumbit</button>
</div>

@endsection