<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Laravel Book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ URL::to('/') }}" class="nav-link active" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('buku') }}" class="nav-link" aria-current="page">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('penerbit') }}" class="nav-link" aria-current="page">Daftar Penerbit</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('buku/laporan') }}" class="nav-link" aria-current="page">Laporan Buku</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                @if(Auth::check())
                    <a href="{{ url('login/logout') }}" class="nav-link px-3">Sign Out</a>
                @else
                    <a href="{{ url('login') }}" class="nav-link px-3">Sign In</a>
                @endif
            </div>
        </div>
    </div>

</nav>