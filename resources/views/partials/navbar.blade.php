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