@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('vendors/prism/prism.css')}}" type="text/css">
@endsection

@section('content')

<div class="row no-gutters app-block">
    <div class="col-md-2 app-sidebar">
        <div class="app-sidebar-menu">
            <div>
                <div class="list-group list-group-flush">
                    <a href="{{url('/data_master/settings')}}" class="list-group-item d-flex align-items-center" id="setting">
                        <i class="ti-settings mr-2 list-group-icon"></i>Setting
                    </a>
                    {{-- <a href="{{url('/data_master/users')}}" class="list-group-item d-flex align-items-center" id="manajemen_pengguna">
                        <i class="ti-desktop mr-2 list-group-icon"></i>Manajemen Pengguna
                    </a> --}}
                    <a href="{{url('/data_master/employes')}}" class="list-group-item d-flex align-items-center" id="pegawai">
                        <i class="ti-user mr-2 list-group-icon"></i>Pegawai
                        <span class="small ml-auto" id="total_pegawai">0</span>
                    </a>
                    <a href="{{url('/data_master/customer')}}" class="list-group-item d-flex align-items-center" id="customer">
                        <i class="ti-user mr-2 list-group-icon"></i>Customer
                        <span class="small ml-auto" id="total_customer">0</span>
                    </a>
                    <a href="{{url('/data_master/pemilik-kendaraan')}}" class="list-group-item d-flex align-items-center" id="vendor">
                        <i class="ti-star mr-2 list-group-icon"></i>Pemilik Kendaraan
                        <span class="small ml-auto" id="total_vendor">0</span>
                    </a>
                    <a href="{{url('/data_master/kendaraan')}}" class="list-group-item d-flex align-items-center" id="kendaraan">
                        <i class="ti-car mr-2 list-group-icon"></i>Kendaraan
                        <span class="small ml-auto" id="total_kendaraan">0</span>
                    </a>
                    <a href="{{url('/data_master/body')}}" class="list-group-item d-flex align-items-center" id="body">
                        <i class="ti-car mr-2 list-group-icon"></i>Body
                    </a>
                    <a href="{{url('/data_master/harga-kendaraan')}}" class="list-group-item d-flex align-items-center" id="harga_kendaraan">
                        <i class="ti-money mr-2 list-group-icon"></i>Harga Kendaraan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 app-content">
        @yield('content-data-master')
    </div>
</div>

@endsection

@section('extra-script')
    <script src="{{asset('vendors/prism/prism.js')}}"></script>
@endsection
