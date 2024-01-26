@extends('depan.layout.app')

@section('content')
    <!-- Page breadcrumb -->
    <section id="mu-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-page-breadcrumb-area">
                        <h2>Contact</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb -->

    <!-- Start contact  -->
    <section id="mu-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-contact-area">
                        <!-- start title -->
                        <div class="mu-title">
                            <h2>Kontak Kami</h2>
                            <p>"Jangan sungkan untuk menghubungi kami kapan saja yang Anda butuhkan. Kami siap sedia untuk
                                membantu dan melayani Anda dengan senang hati."</p>
                        </div>
                        <!-- end title -->
                        <!-- start contact content -->
                        <div class="mu-contact-content">
                            @if ($message = Session::get('pesan'))
                                <div class="alert alert-success" style="margin-top: 20px; margin-bottom:0%; "
                                    data-bs-toggle="alert">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mu-contact-left">
                                        <form class="contactform" method="post" action="{{ url('/kontakKirim') }}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <p class="comment-form-author">
                                                <label for="author">Nama <span class="required">*</span></label>
                                                <input type="text" required="required" size="30" value=""
                                                    name="nama_kontak">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="email" required="required" aria-required="true"
                                                    value="" name="email_kontak">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">No Telp <span class="required">*</span></label>
                                                <input type="text" required="required" aria-required="true"
                                                    value="" name="notel_kontak">
                                            </p>
                                            <p class="comment-form-url">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject_kontak">
                                            </p>
                                            <p class="comment-form-comment">
                                                <label for="comment">Pesan</label>
                                                <textarea required="required" aria-required="true" name="pesan_kontak"></textarea>
                                            </p>
                                            <p class="form-submit">
                                                <button type="submit" value="Send Message"
                                                    class="mu-post-btn">Submit</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mu-contact-right">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5332793425555!2d107.67208917578776!3d-6.826473066776014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68de1ecb73973d%3A0x2d6424a39eec849!2sSMK%20Putra%20Nasional%20Cibodas!5e0!3m2!1sid!2sid!4v1692049469256!5m2!1sid!2sid"
                                            width="100%" height="450" frameborde="0" style="border:0; shadow: 1px;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end contact content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact  -->
@endsection
