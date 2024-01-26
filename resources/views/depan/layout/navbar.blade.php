<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- TEXT BASED LOGO -->
            <!-- <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Varsity</span></a> -->
            <!-- IMG BASED LOGO  -->
            {{-- <a class="navbar-brand" href="index.html"><img src="{{ url('/') }}/users/assets/img/logo.png"
                    alt="logo"></a> --}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="{{$title == "beranda" ? 'active': ''}}"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item {{$title == "visimisi" ? 'active': ''}}">
                    <a class="nav-link" href="{{ url('/visimisi') }}">Visi & Misi</a>
                </li>
                <li class="{{$title == "galeri" ? 'active': ''}}"><a href="{{ url('/galeris') }}">Galeri</a></li>
                <li class="{{$title == "blog" ? 'active': ''}}"><a href="{{ url('/blog') }}">Blog</a></li>
                <li class="{{$title == "kontak" ? 'active': ''}}"><a href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
