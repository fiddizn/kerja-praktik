<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://ifwdc2018k4.files.wordpress.com/2018/09/cropped-logo-ifa12.png"
        type="image">
    <link rel="stylesheet" href="css/login.css">
    <title>{{ $title }} | Sistem Informasi TA 1</title>
</head>

<body>
    @include('partials/navbar')
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row align-items-center">
            <div class="col-sm-5">
                <div class="title-home">
                    <h1 style=" text-align:end;">Sistem Informasi<br>Tugas Akhir 1<br>Jurusan Informatika</h1>
                </div>
            </div>
            <div class="col-sm">
                <div class="registration-form px-4">
                    <form action="/" method="post">
                        @csrf
                        <div class="form-icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="-1 0 18 18">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="number" max="3411199999"
                                class="form-control item @error('nim') is-invalid @enderror" name="nim" id="nim"
                                placeholder="NIM/NID" required autofocus value="{{ old('nim') }}">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class=" form-group">
                            <button type="submit" class="btn btn-block create-account">Login</button>
                            <div class="span">
                                <span>Tidak punya akun? Daftar <a href="/register">di sini</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
        </script>
        <script src="js/login.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>