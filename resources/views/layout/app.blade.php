<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="admin/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='admin/assets/img/favicon.ico' />

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--chartjs-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div id="main-wrapper">

        @include('component.header')
        @include('component.sidebar')
        @yield('content')
    </div>

    <!-- Footer content -->
    @include('component.footer')

    <!-- General JS Scripts -->
    <script src="admin/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="admin/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="admin/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="admin/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="admin/assets/js/custom.js"></script>



</body>

</html>
