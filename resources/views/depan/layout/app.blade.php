<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Putra Nasional Cibodas</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/users/assets/img/favicon.png" type="image/x-icon">
    <!-- Font awesome -->
    <link href="{{ url('/') }}/users/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ url('/') }}/users/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/users/assets/css/slick.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ url('/') }}/users/assets/css/jquery.fancybox.css" type="text/css"
        media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{ url('/') }}/users/assets/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Main style sheet -->
    <link href="{{ url('/') }}/users/assets/css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet'
        type='text/css'>

</head>

<body>

    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start menu -->
    <section id="mu-menu">
        @include('depan.layout.navbar')
    </section>
    <!-- End menu -->

    @yield('content')

    <!-- Start footer -->
    <div class="">
        @include('depan.layout.footer')
    </div>
    <!-- End footer -->

    <!-- jQuery library -->
    <script src="{{ url('/') }}/users/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ url('/') }}/users/assets/js/bootstrap.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="{{ url('/') }}/users/assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="{{ url('/') }}/users/assets/js/waypoints.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/users/assets/js/jquery.counterup.js"></script>
    <!-- Mixit slider -->
    <script type="text/javascript" src="{{ url('/') }}/users/assets/js/jquery.mixitup.js"></script>
    <!-- Add fancyBox -->
    <script type="text/javascript" src="{{ url('/') }}/users/assets/js/jquery.fancybox.pack.js"></script>


    <!-- Custom js -->
    <script src="{{ url('/') }}/users/assets/js/custom.js"></script>

</body>

</html>
