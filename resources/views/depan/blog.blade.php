@extends('depan.layout.app')

@section('content')
    <!-- Page breadcrumb -->
    <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-page-breadcrumb-area">
                        <h2>Blog Archive</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Arsip Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb -->
    <section id="mu-course-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-course-content-area">
                        <div class="row">
                            <div class="col-md-9">
                                <!-- start course content container -->
                                <div class="mu-course-container mu-blog-archive">
                                    <div class="row">
                                        @foreach ($data as $blog)
                                            <div class="col-lg-4 col-md-4 col-xs-12">
                                                <div class="mu-latest-course-single">
                                                    {{-- <div style="position: absolute; background: black; color:white; padding: 2px 10px 2px 10px;">
                                                        Kategori</div> --}}
                                                    <figure class="mu-latest-course-img">
                                                        <a href="#"><img
                                                                src="{{ url('/storage') . '/' . $blog->gambar }}"
                                                                id="output" width="100%"></a>
                                                        <figcaption class="mu-latest-course-imgcaption">
                                                            <a href="#">{{ $blog->penulis }} </a>
                                                            <span><i class="fa fa-clock-o"></i>{{ $blog->tanggal }}</span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="mu-latest-course-single-content">
                                                        <h4><a href="#">{{ $blog->judul }}</a></h4>
                                                        <p>{{ $blog->kutipan }}</p>
                                                        <div class="mu-latest-course-single-contbottom">
                                                            <a class="mu-course-details"
                                                                href="{{ url('/blogDetail' . '/' . $blog->judul ) }}">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- end course content container -->
                                <!-- start course pagination -->
                                <div class="mu-pagination">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $data->links() }}
                                        </ul>
                                    </nav>
                                </div>
                                <!-- end course pagination -->
                            </div>
                            <div class="col-md-3">
                                <!-- start sidebar -->
                                <aside class="mu-sidebar">
                                    <!-- start single sidebar -->
                                    <div class="mu-single-sidebar">
                                        <h3>Categories</h3>
                                        <ul class="mu-sidebar-catg">
                                            @foreach ($kategori as $ray)
                                                <li><a
                                                        href="{{ url('/blogKategori' . '/' . $ray->nama_kategori) }}">{{ $ray->nama_kategori }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- end single sidebar -->
                                    <!-- start single sidebar -->
                                    <div class="mu-single-sidebar">
                                        <h3>Tags Cloud</h3>
                                        <div class="tag-cloud">
                                            @foreach ($kategori as $data)
                                                <a
                                                    href="{{ url('/blogKategori' . '/' . $data->nama_kategori) }}">{{ $data->nama_kategori }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end single sidebar -->
                                </aside>
                                <!-- / end sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
