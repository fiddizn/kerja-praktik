<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://ifwdc2018k4.files.wordpress.com/2018/09/cropped-logo-ifa12.png"
        type="image">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- installation of Font Awesome via CDN -->
    <script src="https://kit.fontawesome.com/02ffe47e92.js" crossorigin="anonymous"></script>

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
    </style>

    <!-- datetime picker -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

    <title>{{ $title }} | Sistem Informasi TA 1</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #595959;">
        <div class="container">
            <img src="https://ifwdc2018k4.files.wordpress.com/2018/09/cropped-logo-ifa12.png" alt="informatika.png"
                width="40">
            <a class="navbar-brand ms-2" href="/">SITAONE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    @if (auth()->user())
                    @if (isset(auth()->user()->mahasiswa))
                    <li class="nav-item">
                        <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->mahasiswa->name }} ({{ $role }})</small>
                        </div>
                    </li>
                    <li class=" nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                        </form>
                    </li>
                    @elseif (isset(auth()->user()->dosen))
                    <li class="nav-item">
                        <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">{{ auth()->user()->dosen->name }} ({{ $role }})</small>
                        </div>
                    </li>
                    <li class=" nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <div class="keterangan mt-1 me-4 text-secondary" ">
                        <small style=" color:#e6e6e6">({{ $role }})</small>
                        </div>
                    </li>
                    <li class=" nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                        </form>
                    </li>
                    @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class=" container pt-4">

        <h2 class="text-center">{{ $title }}</h2>
        <div class="row justify-content-center">
            <table class="table table-sm mt-5" style="width: 750px;">
                <tbody>
                    <tr>
                        <th scope="col">NO </th>
                        <th scope="col">NIM </th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Peminatan </th>
                        <th scope="col">Status Kelolosan</th>
                    </tr>
                </tbody>
                @foreach ($list_pendaftaran as $key=> $pendaftaran)
                <tbody>
                    @if ($pendaftaran->status == 'Lolos')
                    <tr>
                        <th scope="row">{{ $list_pendaftaran->firstItem()+ $key}}</th>
                        <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                        <td>{{ $pendaftaran->mahasiswa->name }}</td>
                        <td>{{ $pendaftaran->peminatan }}</td>
                        <td><button style="width: 9rem;" type="submit"
                                class="btn btn-success">{{ $pendaftaran->status }}
                            </button></td>
                    </tr>
                    @elseif ($pendaftaran->status == 'Lolos Bersyarat')
                    <tr>
                        <th scope="row">{{ $list_pendaftaran->firstItem()+ $key}}</th>
                        <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                        <td>{{ $pendaftaran->mahasiswa->name }}</td>
                        <td>{{ $pendaftaran->peminatan }}</td>
                        <td><button style="width: 9rem;" type="submit"
                                class="btn btn-warning">{{ $pendaftaran->status }}
                            </button></td>
                    </tr>
                    @elseif ($pendaftaran->status == 'Pending')
                    <tr>
                        <th scope="row">{{ $list_pendaftaran->firstItem()+ $key}}</th>
                        <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                        <td>{{ $pendaftaran->mahasiswa->name }}</td>
                        <td>{{ $pendaftaran->peminatan }}</td>
                        <td><button style="width: 9rem;" type="submit" class="btn btn-danger">{{ $pendaftaran->status }}
                            </button></td>
                    </tr>
                    @else
                    <tr>
                        <th scope="row">{{ $list_pendaftaran->firstItem()+ $key}}</th>
                        <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                        <td>{{ $pendaftaran->mahasiswa->name }}</td>
                        <td>{{ $pendaftaran->peminatan }}</td>
                        <td><button style="width: 9rem;" type="submit" class="btn btn-dark">{{ $pendaftaran->status }}
                            </button></td>
                    </tr>
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>