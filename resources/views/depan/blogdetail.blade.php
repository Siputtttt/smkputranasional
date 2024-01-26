@extends('depan.layout.app')

@section('content')
    <!-- Page breadcrumb -->
    <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-page-breadcrumb-area">
                        <h2>Blog Detail</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('/blog') }}">Arsip blog</a></li>
                            <li class="active">Blog Detail</li>
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
                                <div class="mu-course-container mu-blog-single">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <article class="mu-blog-single-item">
                                                <figure class="mu-blog-single-img">
                                                    <a href="#"><img src="{{ url('/storage') . '/' . $data->gambar }}"
                                                            id="output" width="100%"></a>
                                                    <figcaption class="mu-blog-caption">
                                                        <h3><a href="#">{{ $data->judul }}</a></h3>
                                                    </figcaption>
                                                </figure>
                                                <div class="mu-blog-meta">
                                                    <a href="#">{{ $data->penulis }}</a> |
                                                    <a href="#">{{ $data->tanggal }}</a> |
                                                    <a href="#">{{ $data->nama_kategori }}</a> |
                                                    <span><i class="fa fa-comments-o"></i>{{$jmlkt}}</span>
                                                </div>
                                                <div class="mu-blog-description">
                                                    {!! $data->isi !!}
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <!-- end course content container -->
                                <!-- start blog navigation -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mu-blog-single-navigation">
                                            <a class="mu-blog-prev" href="#"><span
                                                    class="fa fa-angle-left"></span>Prev</a>
                                            <a class="mu-blog-next" href="#">Next<span
                                                    class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end blog navigation -->
                                <!-- start related course item -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mu-related-item">
                                            <h3>Related News</h3>
                                            <div class="mu-related-item-area">
                                                <div id="mu-related-item-slide">
                                                    @foreach ($blog as $blog)
                                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                                            <div class="mu-latest-course-single">
                                                                <figure class="mu-latest-course-img">
                                                                    <a href="#"><img
                                                                            src="{{ url('/storage') . '/' . $blog->gambar }}"
                                                                            alt="img"></a>
                                                                    <figcaption class="mu-latest-course-imgcaption">
                                                                        <a href="#">{{ $blog->penulis }} </a>
                                                                        <span><i
                                                                                class="fa fa-clock-o"></i>{{ $blog->tanggal }}</span>
                                                                    </figcaption>
                                                                </figure>
                                                                <div class="mu-latest-course-single-content">
                                                                    <h4><a href="#">{{ $blog->judul }}</a></h4>
                                                                    <p>{{ $blog->kutipan }}</p>
                                                                    <div class="mu-latest-course-single-contbottom">
                                                                        <a class="mu-course-details"
                                                                            href="{{ url('/blogDetail' . '/' . $blog->judul . '/' . $blog->id) }}">Details</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end start related course item -->
                                <!-- start blog comment -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mu-comments-area">
                                            <h3>{{ $jmlkt }} Komentar</h3>
                                            @foreach ($komentar as $kmt)
                                                @if ($kmt->status == 'validasi')
                                                    <div class="comments">
                                                        <ul class="commentlist">
                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <h4 class="author-name"><b>{{ $kmt->nama }}</b>
                                                                        </h4>
                                                                        <span
                                                                            class="comments-date">{{ $kmt->created_at }}</span>
                                                                        <p>{{ $kmt->komentar }}
                                                                        </p>
                                                                        {{-- <a class="reply-btn" href="#">Reply <span
                                                                            class="fa fa-long-arrow-right"></span></a> --}}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mu-pagination">
                                    <nav>
                                        <ul class="pagination">
                                            {{ $komentar->links() }}
                                        </ul>
                                    </nav>
                                </div>
                                <!-- end blog comment -->
                                <!-- start respond form -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="respond">
                                            <h3 class="reply-title">Beri Komentar</h3>
                                            @if ($message = Session::get('pesan'))
                                                <div class="alert alert-success"
                                                    style="margin-top: 20px; margin-bottom:0%; " data-bs-toggle="alert">
                                                    <button type="button" class="btn-close float-end"
                                                        data-bs-dismiss="alert"></button>
                                                    {{ $message }}
                                                </div>
                                            @endif
                                            <form method="post" action="{{ url('/komentars') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <p class="comment-form-author">
                                                    <label for="author">Nama <span class="required">*</span></label>
                                                    <input type="hidden" required="required" size="30"
                                                        value="{{ $data->id }}" name="id_blog">
                                                    <input type="hidden" required="required" size="30"
                                                        value="{{ $data->judul }}" name="judul">
                                                    <input type="text" required="required" size="30" value=""
                                                        name="nama">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input type="email" required="required" aria-required="true"
                                                        value="" name="email">
                                                </p>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Komentar</label>
                                                    <textarea required="required" aria-required="true" rows="8" cols="45" name="komentar"></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <button type="submit" value="Post Comment" class="mu-post-btn">Post
                                                        Komentar</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end respond form -->
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
