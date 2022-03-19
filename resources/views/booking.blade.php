@extends('layouts.app')

@section('extra-css')
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="{{asset('vendors/fullcalendar/fullcalendar.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/clockpicker/bootstrap-clockpicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/daterangepicker.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>Selamat Datang, {{ auth()->user()->username }}</h3>
        <!-- <p class="text-muted">This page shows an overview for your account summary.</p> -->
    </div>
    <div class="mt-3 mt-md-0">
        <div class="btn btn-outline-light">
            <span>@php echo date("d F Y"); @endphp</span>
        </div>
        {{-- <a href="#" class="btn btn-primary ml-0 ml-md-2 mt-2 mt-md-0 dropdown-toggle" data-toggle="dropdown">Actions</a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item">Download</a>
            <a href="#" class="dropdown-item">Print</a>
        </div> --}}
    </div>
</div>
@if(session()->has('error'))
<div class="row col-md-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti-close"></i>
        </button>
    </div>
</div>
@endif
<div class="row no-gutters app-block">
    <!-- <div class="col-md-3 app-sidebar">
        <h3 class="mb-4">Calendar</h3>
        <button class="btn btn-primary btn-block mb-3" data-toggle="modal"
                data-target="#createEventModal">
            Add Event
        </button>
        <p class="font-weight-bold mb-1">Events</p>
        <p class="small text-muted mb-2">Drag and drop your event</p>
        <div>
            <div class="list-group list-group-flush" id="external-events">
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-success" data-icon="car"></i> Holidays
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-danger" data-icon="users"></i> Travel
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-info" data-icon="coffee"></i> Friend
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-warning" data-icon="diamond"></i> Company
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-primary" data-icon="glass"></i> Team Assing
                </div>
                <div class="list-group-item fc-event">
                    <i class="fa fa-circle text-secondary" data-icon="glass"></i> Family
                </div>
            </div>
        </div>
        <div class="custom-control custom-checkbox mt-3">
            <input type="checkbox" class="custom-control-input" id="drop-remove" checked="">
            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
        </div>
    </div> -->
    <div class="col-md-12">
        <!-- <div class="app-content-overlay"></div> -->
        <div class="card">
            <div class="card-body">
                <div class="responsive" id="calendar-demo"></div>
            </div>
        </div>
    </div>
</div>

<!-- begin::Create Event Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Tambah Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('store_booking') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Customer Lama?</label>
                        <div class="col-sm-8">
                            <div class="mt-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="sudah_ada" class="custom-control-input" value="1" id="customCheck" checked>
                                    <label class="custom-control-label" for="customCheck">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-customer" style="display: none">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Nama*
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Email
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                No. Telp*
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" id="no_telp" class="form-control">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                No. KK
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="no_kk" id="no_kk" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                NIK*
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="nik" id="nik" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Alamat*
                            </label>
                            <div class="col-sm-9">
                                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="select-customer" style="display: block">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Customer
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control select-component select-customer" id="customer" name="customer" required>
                                    <option selected disabled>Pilih Customer . . </option>
                                    @foreach ($data['customer'] as $d)
                                        <option value="{{ $d->id_customer }}">{{ $d->no_nik_customer }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Customer
                            </label>
                            <div class="col-sm-9">
                                <input type="text" id="cust" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Sales
                            </label>
                            <div class="col-sm-9">
                                <input type="text" id="sales_name" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Pelayanan
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control select-component select-service" id="service" name="service" required>
                                {{-- <option selected disabled>Pilih Pelayanan . . </option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Mulai
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="start_date" id="start_date" class="form-control change-date datepicker">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group clockpicker-example">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control change-date" name="start_time" id="start_time" value="00:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Selesai
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="end_date" id="end_date" class="form-control change-date datepicker">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group clockpicker-example">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control change-date" name="end_time" id="end_time" value="00:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Kendaraan
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control select-component select-vehicle" id="vehicle" name="vehicle" required>
                                <option selected disabled>Pilih Kendaraan . . </option>
                                {{-- @foreach ($data['vehicle'] as $v)
                                    <option value="{{ $v->ID_VEHICLES }}">{{ $v->NOPOL }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Harga
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="real_price" id="real_price" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Komisi Sales
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" id="harga" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            DP
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="dp" id="dp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Bukti Bayar
                        </label>
                        <div class="col-sm-9">
                            <input type="file" name="bukti_bayar" id="bukti_bayar">
                            <small style="color: red; font-style: italic">Maksimal 2MB.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end::Create Event Modal -->

<!-- begin::Event Info Modal -->
<div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">
                    <span class="event-icon mr-2"></span>
                    <span class="event-title">Modal Title</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="event-body"></div>
                <br>
                {{-- <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="button" id="" class="btn btn-sm btn-primary reschedule">Reschedule</button>&nbsp;
                        @if(auth()->user()->role == 1)
                            <button type="button" id="" class="btn btn-sm btn-warning approve">Approve</button>
                        @endif
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- end::Event Info Modal -->

<div class="modal fade" id="update-jadwal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Reschedule Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update_booking') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_booking_update" id="id_booking_update" class="form-control">
                    <div class="update-customer">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">
                                Nama*
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="name_update" id="name_update" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kendaraan Sama?</label>
                        <div class="col-sm-8">
                            <div class="mt-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="kendaraan_sama" class="custom-control-input" value="1" id="kendaraan_sama" checked>
                                    <label class="custom-control-label" for="kendaraan_sama">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Mulai
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="update_start_date" id="update_start_date" class="form-control change-date datepicker">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group clockpicker-example">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control change-date" name="update_start_time" id="update_start_time" value="00:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Selesai
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="update_end_date" id="update_end_date" class="form-control change-date datepicker">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group clockpicker-example">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control change-date" name="update_end_time" id="update_end_time" value="00:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="pilih_kendaraan">
                        <label for="" class="col-sm-3 col-form-label">
                            Kendaraan
                        </label>
                        <div class="col-sm-9">
                            <input type="hidden" name="id_vehicle_update" id="id_vehicle_update" class="form-control">
                            <input type="text" name="nopol_update" id="nopol_update" class="form-control" readonly>
                            <div id="update_pilih_kendaraan" style="display: none">
                                <select class="form-control select-component select-vehicle" id="vehicle" name="vehicle">
                                    <option selected disabled>Pilih Kendaraan . . </option>
                                    {{-- @foreach ($data['vehicle'] as $v)
                                        <option value="{{ $v->ID_VEHICLES }}">{{ $v->NOPOL }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Harga
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="harga_update" id="harga_update" class="form-control">
                            <input type="hidden" name="real_price_update" id="real_price_update" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            DP
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="dp_update" id="dp_update" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-9">
                            <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-script')

    <!-- Fullcalendar -->
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.js') }}"></script>
    <script src="{{asset('vendors/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('vendors/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/examples/fullcalendar.js')}}"></script>
    <script src="{{asset('assets/js/examples/pages/calendar.js')}}"></script>
    <script src="{{ asset('vendors/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('vendors/datepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/custom/booking.js')}}"></script>

@endsection
