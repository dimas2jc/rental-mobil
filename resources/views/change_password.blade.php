<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('COMPANY_NAME')}}</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ env('LOGO_LOGIN') }}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bundle.css') }}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <h5>Ganti Password</h5>
    @if(session()->has('error'))
        <div class="alert alert-danger" style="color: black">{{ session('error') }}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success" style="color: black">{{ session('success') }}</div>
    @endif

    <!-- form -->
    <form action="{{ url('post-change-password') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="password" name="password_old" class="form-control" placeholder="Password Lama" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_new" class="form-control" placeholder="Password Baru" required>
        </div>
        {{-- <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="recovery-password.html">Reset password</a>
        </div> --}}
        @if(session()->has('success'))
            <a href="{{ url('/') }}"><button type="button" class="btn btn-warning btn-block">Kembali</button></a>
        @else
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        @endif
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="{{ asset('vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
