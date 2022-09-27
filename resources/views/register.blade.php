<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <form>
                        <div class="form-icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                                    class="bi bi-person-plus-fill" viewBox="0 -6 14 20">
                                    <path
                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item" id="password2"
                                placeholder="Verify Password">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-block create-account">Register</button>
                            <div class="span">
                                <span>Sudah punya akun? Login <a href="/">di sini</a></span>
                            </div>
                        </div>
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
</body>

</html>