<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-16x16.png')}}" type='image/x-icon'>
    <title>@yield('title') | Male-Fashion</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon.png') }}">
    {{-- <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    @yield('css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('assets/admin/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/respond.min.js') }}"></script>
  <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        @include('admin.blocks.header')

        @include('admin.blocks.menu')

        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!--**********************************
            Scripts
        ***********************************-->
    <script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>

    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart-data.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/3377b5a3db.js" crossorigin="anonymous"></script>

    @if (Session::has('ssmsg'))
        <script>
            swal("Thành công!", "{{ Session::get('ssmsg') }}", "success");
        </script>
    @endif
    @if (Session::has('ermsg'))
        <script>
            swal("Thất bại!", "{{ Session::get('ermsg') }}", "warning");
        </script>
    @endif
    @yield('script')
</body>

</html>
