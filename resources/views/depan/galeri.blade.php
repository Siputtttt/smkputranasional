@extends('depan.layout.app')

@section('content')
    <!-- Page breadcrumb -->
    <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-page-breadcrumb-area">
                        <h2>Gallery</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb -->
    <!-- Start gallery  -->
    <section id="mu-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-gallery-area">
                        <!-- start title -->
                        <div class="mu-title">
                            <h2>Semua Moment</h2>
                            <p>"Jangan ragu untuk melihat dengan seksama dan menikmati setiap momen yang terhampar di galeri
                                ini. Biarkan setiap gambar menceritakan cerita uniknya sendiri, dan biarkan dirimu terbawa
                                dalam perjalanan melalui waktu dan emosi yang terabadikan dalam setiap bingkai."</p>
                        </div>
                        <!-- end title -->
                        <!-- start gallery content -->
                        <div class="mu-gallery-content">
                            <!-- Start gallery menu -->
                            <div class="mu-gallery-top">
                                <ul>
                                    <li class="filter active" data-filter="all">All</li>
                                    @foreach ($kategori as $ktgr)
                                        <li class="filter" data-filter=".{{$ktgr->nama_kategori}}">{{$ktgr->nama_kategori}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End gallery menu -->
                            <div class="mu-gallery-body">
                                <ul id="mixit-container" class="row">
                                    <!-- start single gallery image -->
                                    @foreach ($galeri as $galeri)
                                        <li class="col-md-4 col-sm-6 col-xs-12 mix {{ $galeri->nama_filter }}">
                                            <div class="mu-single-gallery">
                                                <div class="mu-single-gallery-item">
                                                    <div class="mu-single-gallery-img">
                                                        <a href="#"><img alt="img"
                                                                src="{{ url('/galeri') . '/' . $galeri->gambar }}"></a>
                                                    </div>
                                                    <div class="mu-single-gallery-info">
                                                        <div class="mu-single-gallery-info-inner">
                                                            <h4>{{ $galeri->judul_gambar }}</h4>
                                                            {{-- <p>Web Design</p> --}}
                                                            <a href="{{ url('/galeri') . '/' . $galeri->gambar }}"
                                                                data-fancybox-group="gallery" class="fancybox"><span
                                                                    class="fa fa-eye"></span></a>
                                                            {{-- <a href="#" class="aa-link"><span
                                                                    class="fa fa-link"></span></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end gallery content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End gallery  -->
@endsection
