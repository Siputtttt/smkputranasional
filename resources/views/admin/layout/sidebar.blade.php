<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ $title == 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Kelola</div>
            @can('root')
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                    Kelola Akun
                </a>
            @endcan
            @can('admin')
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                    Kelola Akun
                </a>
            @endcan
            <a class="nav-link collapsed {{ $title == 'blog' ? 'active' : '' }}" href="#"
                data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Blog
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('/Blog') }}">Kelola Blog</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('/Kategori') }}">Kelola Kategori</a>
                </nav>
            </div>
            <a class="nav-link {{ $title == 'galeri' ? 'active' : '' }}" href="{{ url('/GaleriA') }}">
                <div class="sb-nav-link-icon"><i class="fa-regular fa-images"></i></div>
                Galeri
            </a>
            <a class="nav-link {{ $title == 'komentar' ? 'active' : '' }}" href="{{ url('Komentar') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                Komentar
            </a>
            <a class="nav-link {{ $title == 'kontak' ? 'active' : '' }}" href="{{ url('KontakA') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                Kontak
            </a>
            <div class="sb-sidenav-menu-heading">Setting</div>
            <a class="nav-link {{ $title == 'profile' ? 'active' : '' }}" href="{{ url('/profile') }}">
                <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    LogOut
                </a>
            </form>
        </div>
    </div>
</nav>
