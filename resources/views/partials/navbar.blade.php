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
                @if (isset(auth()->user()->email))
                <li class="nav-item">
                    <div class="keterangan mt-1 me-4 text-secondary" ">
                        @if (isset(auth()->user()->mahasiswa->name))
                        <small style=" color:#e6e6e6">{{ auth()->user()->mahasiswa->name }} ({{ $role }})</small>
                        @elseif (isset(auth()->user()->kooridinator->name))
                        <small style=" color:#e6e6e6">{{ auth()->user()->koordinator->name }} ({{ $role }})</small>
                        @else
                        <small style=" color:#e6e6e6">{{ auth()->user()->email }} ({{ $role }})</small>
                        @endif

                    </div>
                </li>
                <li class=" nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm" href="#">Logout</button>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>