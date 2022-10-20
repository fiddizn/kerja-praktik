<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="row align-items-center">
            <div class="col-sm">
                <div class="registration-form">
                    <form action="/register" method="post">@csrf
                        <div class="form-icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                                    class="bi bi-person-plus-fill" viewBox="0 0 14 20">
                                    <path
                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="number" min="3411160000" max="3411199999"
                                class="form-control item @error('nim')is-invalid @enderror" name="nim" id="nim"
                                placeholder="NIM" required autofocus value="{{ old('nim') }}">
                            <div id="nim" class="invalid-feedback">Mohon menggunakan NIM yang benar!</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item @error('name')is-invalid @enderror" name="name"
                                id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item @error('password')is-invalid @enderror"
                                name="password" id="password" placeholder="Password" required>
                            <div id="email" class="invalid-feedback">Password harus lebih dari 4 karakter!</div>
                        </div>
                        <div class=" form-group">
                            <input type="password" class="form-control item @error('password2')is-invalid @enderror"
                                name="password2" id="password2" placeholder="Verify Password" required>
                            <div id="email" class="invalid-feedback">Password harus lebih dari 4 karakter!</div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block create-account">Register</button>
                            <div class="span">
                                <span>Sudah punya akun? Login <a href="/">di sini</a></span>
                            </div>
                        </div>
                        <input type="hidden" id="role_id" name="role_id" value='1'>
                    </form>
                </div>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
                </script>
                <script src="js/login.js"></script>
            </div>

            <div class="col-sm-5">
                <div class="title-home">
                    <h1>Sistem Informasi<br>Tugas Akhir 1<br>Jurusan Informatika</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>