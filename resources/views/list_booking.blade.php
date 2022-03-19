@extends('layouts.app')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/clockpicker/bootstrap-clockpicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/daterangepicker.css') }}" type="text/css">
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>List Booking</h5>
        </div>
        <div style="overflow-x: auto;">
            <table id="table-list" class="table table-striped table-bordered" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer</th>
                        <th>Sales</th>
                        <th>Kendaraan</th>
                        <th>Tanggal Ambil</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

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
                <form action="{{ url('update_booking') }}" method="POST">
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
                            {{-- <input type="text" name="harga_update" id="harga_update" class="form-control"> --}}
                            <input type="text" name="real_price_update" id="real_price_update" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">
                            Komisi Sales
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="harga_update" id="harga_update" class="form-control" readonly>
                            {{-- <input type="hidden" name="real_price_update" id="real_price_update" class="form-control"> --}}
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
    <script src="{{ asset('vendors/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/list_booking.js')}}"></script>
@endsection
