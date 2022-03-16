<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('COMPANY_NAME') }}</title>

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

    <!-- logo -->
    <div id="logo">
        <img src="{{ env('LOGO_LOGIN') }}" style="max-width: 50%" alt="image">
    </div>
    <!-- ./ logo -->


    <h5>Sign in</h5>
    @if(session()->has('error'))
        <div class="alert alert-danger" style="color: black">{{ session('error') }}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-primary" style="color: black">{{ session('message') }}</div>
    @endif

    <!-- form -->
    <form action="{{ url('post-login') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div> --}}
            <a href="" data-toggle="modal" data-target="#modal-email">Forgot password</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
    <!-- ./ form -->



</div>

<div class="modal fade" id="modal-email" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Masukkan Alamat Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="{{ url('forgot-password') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-email').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">KIRIM</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Plugin scripts -->
<script src="{{ asset('vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
