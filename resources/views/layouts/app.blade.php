<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $data = DB::table('company')->first();
        if($data != null){
            $logo = "/document/setting/".$data->logo_company;
        }
    @endphp
    @if($data != null)
        <title>{{ $data->name_company }}</title>
    @else
        <title>Sistem Informasi Rental</title>
    @endif

    <!-- Favicon -->
    @if($data != null)
        <link rel="shortcut icon" href="{{ url($logo) }}"/>
    @endif

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('vendors/dataTable/datatables.min.css')}}" type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .judul-tabel {
            display: flex;
        }

        .judul-tabel button:hover,
        .judul-tabel a:hover {
            background-color: rgb(68, 8, 38) !important;
        }

        @media only screen and (max-width: 600px) {

            table {
                font-size: 1em;
            }

            .judul-tabel {
                display: block;
            }

            .judul-tabel button {
                margin-top: 10px;
            }

        }
    </style>

    @yield('extra-css')
</head>
<body class="small-navigation">
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-icon"></div>
    <span>Loading...</span>
</div>
<!-- ./ Preloader -->

<!-- Layout wrapper -->
<div class="layout-wrapper">

    <!-- Header -->
    @include('layouts.topnav')
    <!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
        @include('layouts.sidebar')
        <!-- end::navigation -->

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content web-app">
                @yield('content')
            </div>
            <!-- ./ Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

    <!-- Main scripts -->
    <script src="{{asset('vendors/bundle.js')}}"></script>

    <!-- Apex chart -->
    <script src="{{asset('vendors/charts/apex/apexcharts.min.js')}}"></script>

    <!-- Daterangepicker -->
    <script src="{{asset('vendors/datepicker/daterangepicker.js')}}"></script>

    <!-- DataTable -->
    <script src="{{asset('vendors/dataTable/datatables.min.js')}}"></script>

    <!-- Dashboard scripts -->
    <script src="{{asset('assets/js/examples/pages/dashboard.js')}}"></script>

    <!-- App scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

    <script> const baseUrl = "{{ env('APP_URL') }}"; </script>
    <script src="{{asset('vendors/input-mask/jquery.mask.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    @yield('extra-script')

</body>
</html>
