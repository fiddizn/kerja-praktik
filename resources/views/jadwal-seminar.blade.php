@extends('layouts/main')
@section('container')

<h2 class="text-center">Jadwal Seminar</h2>
<div class="d-flex justify-content-around mt">
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <button class="btn" style="width: 4rem; height:3rem; background-color:#ff8c1a;" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-download" viewBox="0 0 16 16">
                    <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path
                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                </svg>
            </button>
        </div>
        <input type="text" class="form-control" placeholder="jadwal-seminar-mhsw-2022.pdf">
    </div>
    <div class="input-group my-5" style="width: 30%;">
        <div class="input-group-prepend">
            <button class="btn" style="width: 4rem; height:3rem; background-color:#ff8c1a;" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-download" viewBox="0 0 16 16">
                    <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path
                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                </svg>
            </button>
        </div>
        <input type="text" class="form-control" placeholder="jadwal-seminar-dosen-2022.pdf">
    </div>
</div>
<div style="height:230px;">

</div>
<div class="col-12 mt-5">
    <a class="btn " href="/koordinator" role="button" style="width: 5rem;background-color:#ff8c1a;">Back</a>
</div>

@endsection