<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lomba</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('admin/assets/img/logo.png') }}" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('publiclanding/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Libraries CSS Files -->
    <link href="{{ asset('publiclanding/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('publiclanding/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('publiclanding/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('publiclanding/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('publiclanding/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('publiclanding/lib/venobox/venobox.css') }}" rel="stylesheet">
    <script src="{{ asset('publiclanding/js/jquery-3.5.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>
    <script src="{{ asset('publiclanding/js/jquery.counterup.min.js') }}"></script>

    <!-- Nivo Slider Theme -->
    <link href="{{ asset('publiclanding/css/nivo-slider-theme.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('publiclanding/css/style_landingpage.css') }}" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="{{ asset('publiclanding/css/responsive.css') }}" rel="stylesheet">


</head>

<body data-spy="scroll" data-target="#navbar-example">

    <div id="preloader"></div>

    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                                    <!--<img src="img/logo_koperasi.png" width="30px" height="30px" >-->
                                    <h1><span>比赛</span> (Perlombaan)</h1>
                                    <!-- Uncomment below if you prefer to use an image logo -->
                                    <!-- <img src="img/logo.png" alt="" title=""> -->
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1"
                                id="navbar-example">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#services">Statistik</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#portfolio">Lomba</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="/masuk">Login</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar-collapse -->
                        </nav>
                        <!-- END: Navigation -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
    </header>
    <!-- header end -->

    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{ asset('publiclanding/img/slider/pic1.jpg') }}" alt=""
                    title="#slider-direction-1" />
                <img src="{{ asset('publiclanding/img/slider/pic22.jpg') }}" alt=""
                    title="#slider-direction-2" />
                <img src="{{ asset('publiclanding/img/slider/pic33.jpg') }}" alt=""
                    title="#slider-direction-3" />

            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <h1 class="title1">比赛</h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">(Perlombaan)</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content text-center">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <h1 class="title1">比赛 </h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">(Perlombaan)</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 3 -->
            <div id="slider-direction-3" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <h1 class="title1">比赛 </h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">(Perlombaan)</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s"
                                    data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- single-well end-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="well-middle">
                        <div class="section-headline text-center">

                            <h4 class="sec-head">Sekilas Tentang Kami</h4>
                            </a>
                            <p>
                                Kami adalah tim yang berdedikasi dalam pengadaan lomba. Dengan visi untuk mempromosikan
                                bakat dan semangat kompetisi, kami berkomitmen menyelenggarakan acara lomba yang
                                menginspirasi, menghibur, dan memberikan kesempatan bagi individu untuk menampilkan
                                kemampuan terbaik mereka.
                                <br><br>
                                Kami mendedikasikan diri menyusun lomba-lomba berkualitas dan beragam di bidang
                                olahraga, seni, teknologi, sains, dan lainnya. Lomba kami membangun karakter, memupuk
                                kerjasama, dan mengasah kemampuan peserta.
                                <br><br>
                                Kami mengutamakan profesionalisme dalam perencanaan, pengorganisasian, dan pelaksanaan
                                lomba. Bekerja dengan ahli dan profesional untuk pengalaman lomba tak terlupakan bagi
                                semua peserta.
                                <br><br>
                                Kami menjunjung tinggi integritas dan transparansi dengan aturan yang adil, evaluasi
                                objektif, dan penghargaan setimpal. Kejujuran dan fair play adalah landasan dalam setiap
                                kompetisi kami.
                                <br><br>
                                Kami undang individu berbakat dan bersemangat untuk bergabung. Lingkungan inklusif dan
                                kesempatan setara bagi semua peserta. Lomba kami adalah kesempatan berbagi inspirasi,
                                mengembangkan diri, dan menjalin hubungan sosial.
                                <br><br>
                                Bersama kami, hadapi tantangan, berinovasi, dan raih prestasi luar biasa dalam setiap
                                lomba. Bergabunglah dan saksikan panggung bakat, persahabatan, dan pertumbuhan individu.
                            </p>
                            <ul>
                                <li>
                                    <i> </i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About area -->

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Statistik Perlombaan</h2>
                    </div>
                </div>
            </div>
            {{-- <div class="row text-center">
                <div class="services-contents">
                    <!-- Start Left services -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-money"></i>
                                    </a>
                                    <h4>Simpanan Pokok</h4>
                                    <p>
                                        Simpanan yang pertama kali dibayarkan oleh anggota koperasi saat bergabung
                                        menjadi anggota
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-handshake-o"></i>
                                    </a>
                                    <h4>Simpanan Wajib</h4>
                                    <p>
                                        Simpanan bersifat wajib, yang harus dibayarkan semua anggota setiap bulan
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <!-- end col-md-4 -->
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-calendar"></i>
                                    </a>
                                    <h4>Simpanan Sukarela</h4>
                                    <p>
                                        Simpanan Sukarela yang mirip seperti tabungan, dengan jumlah dan waktu simpanan
                                        tidak ditentukan
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>

                </div>
            </div> --}}
        </div>
    </div>
    </div>
    <!-- End Service area -->

    <!-- our-skill-area start -->
    <div class="our-skill-area fix hidden-sm">
        <div class="test-overly"></div>
        <div class="skill-bg area-padding-2">
            <div class="container">
                <!-- section-heading end -->
                <div class="row">
                    <div class="skill-text">
                        <!-- single-skill start -->
                        <div class="col-xs-12 col-sm-4 col-md-4 text-center">
                            <div class="single-skill">
                                <div class="diff-ournumbers" id="diffnumbers-1">
                                    <p class="counter-count" style="font-size:70px;color:white;">
                                        {{ $usercount }}
                                    </p>
                                    <br>
                                    <h2>Jumlah User</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-skill end -->
                    <!-- single-skill start -->
                    <div class="col-xs-12 col-sm-4 col-md-4 text-center">
                        <div class="single-skill">
                            <div class="diff-ournumbers" id="diffnumbers-1">
                                <p class="counter-count" style="font-size:70px;color:white;">
                                    {{ $lombaCount }}
                                </p>
                                <br>
                                <h2>Jumlah Lomba</h2>
                            </div>
                        </div>
                    </div>
                    <!-- single-skill end -->
                    <!-- single-skill start -->
                    <div class="col-xs-12 col-sm-4 col-md-4 text-center">
                        <div class="single-skill">
                            <div class="diff-ournumbers" id="diffnumbers-1">
                                <p class="counter-count" style="font-size:70px;color:white;">
                                    {{ $pendaftaranCount }}
                                </p>
                                <br>
                                <h2>Jumlah Pendaftar</h2>
                            </div>
                        </div>
                    </div>
                    <!-- single-skill end -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".counter-count").counterUp({
            delay: 50,
            time: 2000
        });
    </script>
    </div>
    <!-- our-skill-area end -->

    <!-- Faq area start -->
    <div class="faq-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Mengapa Harus Memilih Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="faq-details">
                        <div class="panel-group" id="accordion">
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" class="active" data-parent="#accordion"
                                            href="#check1">
                                            <span class="acc-icons"></span>Simpanan Yang Menguntungkan
                                        </a>
                                    </h4>
                                </div>
                                <div id="check1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            Kami memberikan jasa simpanan 10% per tahun, yang dibayarkan setiap bulan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                            <span class="acc-icons"></span> Pinjaman Untuk Anggota
                                        </a>
                                    </h4>
                                </div>
                                <div id="check2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Pinjaman yang mudah dan terpercaya hanya untuk anggota Koperasi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                            <span class="acc-icons"></span>Berfokus Pada Kepentingan Anggota
                                        </a>
                                    </h4>
                                </div>
                                <div id="check3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <p>
                                            KSP Makmur menyediakan layanan dan produk Simpanan dan Pinjaman untuk
                                            memenuhi kebutuhan anggota.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                            <span class="acc-icons"></span>Aman Dan Terkendali
                                        </a>
                                    </h4>
                                </div>
                                <div id="check4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            KSP Makmur dibawah pengawasan Kementrian Koperasi dan Usaha Kecil dan
                                            Menengah Republik Indonesia,
                                            dan sudah mendapatkan pengesahan Badan Hukum sejak 2017.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="tab-menu">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#p-view-1" role="tab" data-toggle="tab">Project</a>
                            </li>
                            <li>
                                <a href="#p-view-2" role="tab" data-toggle="tab">Planning</a>
                            </li>
                            <li>
                                <a href="#p-view-3" role="tab" data-toggle="tab">Success</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="p-view-1">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>Project</h4>
                                    <p>
                                        KSP Makmur menawarkan proses peminjaman yang mudah. Kemudahan bagi anggota untuk
                                        mendapatkan pinjaman dan modal usaha.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="p-view-2">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>Planning</h4>
                                    <p>
                                        1. Pengurus bersama karyawan menyusun rencana strategis dan taktis baik untuk
                                        jangka panjang maupun jangka pendek.
                                    </p>
                                    <p>
                                        2. Pengurus meminta karyawan menyusun garis besar program operasional.
                                    </p>
                                    <p>
                                        3. Karyawan juga membuat anggaran untuk mencapai hasil yang dikendaki, tanpa
                                        mengabaikan struktur keuangan yang ada.
                                    </p>
                                    <p>
                                        4. Berdasarkan rencana yang ada, dibuatlah kebijakan sebagai pedoman seluruh
                                        pelaksanaan.
                                    </p>
                                    <p>
                                        5. Secara bersama menetapkan kebijakan personalia, karyawan usaha keuangan dan
                                        anggota guna mencapai tujuan yang telah ditetapkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="p-view-3">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>Success</h4>
                                    <p>
                                        1. Konsep bisnis yang menjelaskan secara rinci koperasi sebagai badan usaha,
                                        struktur organisasi, produk dan jasa pelayanan yang dikelola.
                                    </p>
                                    <p>
                                        2. Market, yang membahas dan menganalisa pasar konsumen potensial.
                                    </p>
                                    <p>
                                        3. Finansial, meliputi estimasi pendapatan dan arus kas, neraca serta rasio
                                        keuangan lainnya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Row -->
        </div>
    </div>
    <!-- End Faq Area -->

    <!-- Start Wellcome Area -->
    <div class="wellcome-area">
        <div class="well-bg">
            <div class="test-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wellcome-text">
                            <div class="well-text text-center">
                                <h2>Bergabunglah Menjadi Anggota KSP Makmur</h2>
                                <p>
                                    Dapatkan berbagai macam keuntungan dari beberapa layanan kami
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wellcome Area -->


    <!-- Start reviews Area -->
    <div class="reviews-area hidden-xs">
        <div class="work-us">
            <div class="work-left-text">

            </div>
            <div class="work-right-text text-center">
                <h2>working with us</h2>
                <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
                <a href="#contact" class="ready-btn">Contact us</a>
            </div>
        </div>
    </div>
    <!-- End reviews Area -->

    <!-- Start portfolio Area -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Lomba</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    @foreach ($lombas as $lomba)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h4>{{ $lomba->nama }}</h4>
                                </div>
                                <div class="card-body d-flex align-items-center bg-gradient">
                                    <div class="text-center">
                                        <img src="{{ $lomba->foto }}" alt="Foto Lomba"
                                            class="img-fluid rounded mb-3 mr-3"
                                            style="object-fit: cover; max-height: 200px;">
                                    </div>
                                    <div class="ml-3">
                                        <h6>Tanggal Mulai</h6>
                                        <p>{{ $lomba->tanggal_mulai }}</p>
                                        <h6>Tanggal Selesai</h6>
                                        <p>{{ $lomba->tanggal_selesai }}</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal{{ $lomba->id }}">
                                            Detail
                                        </button>
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
    <!-- awesome-portfolio end -->

    <!-- Start Testimonials -->
    <div class="testimonials-area">
        <div class="testi-inner area-padding">
            <div class="testi-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Start testimonials Start -->
                        <div class="testimonial-content text-center">
                            <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
                            <!-- start testimonial carousel -->
                            <div class="testimonial-carousel">
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Kemenangan bukanlah prioritas utama dalam suatu perlombaan, tapi juga dapat
                                            menjadi pengalaman dan motivasi diri.
                                        </p>
                                        <h6>-Chairul Tanjung-</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Ketekunan juga merupakan kunci keberhasilan dalam segala upaya, tetapi tanpa
                                            <br>ketekunan dalam pertempuran, tidak akan ada kemenangan.
                                        </p>
                                        <h6>-Jocko Willink-</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Kemenangan selalu mungkin bagi orang yang menolak untuk berhenti berjuang.
                                        </p>
                                        <h6>-Napoleon Hill-</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                            </div>
                        </div>
                        <!-- End testimonials end -->
                    </div>
                    <!-- End Right Feature -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->
    <!-- Start contact Area -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-phone"></i></a>
                                <p>
                                    Call: (0333) 846328<br>
                                    <span>Senin - Jumat (08.00 - 14.00)
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <a href="https://gmail.com"><i class="fa fa-envelope-o"></i></a>
                                <p>
                                    Email: kspmakmur@gmail.com<br>
                                    <span>Web: www.kspmakmur.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    Jl Pahlawan Klayu Mayang<br>
                                    <span>Jember, Jawa Timur</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
    <!-- modal detail -->
    @foreach ($lombas as $lomba)
        <div class="modal fade" id="modal{{ $lomba->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $lomba->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal{{ $lomba->id }}Label">{{ $lomba->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ $lomba->foto }}" alt="Foto Lomba" class="img-fluid rounded mb-3"
                                style="object-fit: cover; max-height: 200px;">
                        </div>
                        <h6>Tanggal Mulai</h6>
                        <p>{{ $lomba->tanggal_mulai }}</p>
                        <h6>Tanggal Selesai</h6>
                        <p>{{ $lomba->tanggal_selesai }}</p>
                        <h6>Deskripsi</h6>
                        <p>{{ $lomba->deskripsi }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Start Footer bottom Area -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2>Koperasi Simpan Pinjam</h2>
                                </div>

                                <p> </p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="https://facebook.com/"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://instagram.com/"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head" align="right">
                                <h4>information</h4>
                                <p>
                                    Hubungi kami untuk layanan lebih lanjut
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Tel:</span> (0333) 846328</p>
                                    <p><span>Email:</span> kspmakmur@gmail.com</p>
                                    <p><span>Hari Kerja:</span> (Senin - Sabtu)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>KSP Makmur</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('publiclanding/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/parallax/parallax.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('publiclanding/lib/appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('publiclanding/lib/isotope/isotope.pkgd.min.js') }}"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('publiclanding/contactform/contactform.js') }}"></script>

    <script src="{{ asset('publiclanding/js/main.js') }}"></script>

</body>

</html>
