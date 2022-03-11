@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active mb-3" id="pos_tab" role="tabpanel" aria-labelledby="pos_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Pembayaran</h5>
                </div>
                <form action="" id="formPembayaran" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">
                            Booking
                        </label>
                        <div class="col-sm-4">
                            <label name="label-booking" id="label-booking" class="form-control" style="cursor: pointer;" data-toggle="modal" data-target="#modal-booking">-- Pilih Booking --</label>
                            <input name="input-booking" id="input-booking" class="form-control" hidden>
                        </div>
                        <div class="col-1"></div>
                        <label for="" class="col-sm-1 col-form-label">
                            Sub Total
                        </label>
                        <div class="col-sm-4">
                            <label name="label-subTotal" id="label-subTotal" class="form-control"></label>
                            <input name="input-subTotal" id="input-subTotal" class="form-control" hidden>
                        </div>
                    </div>
                </form>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-charge" data-toggle="modal" data-target="#modal-tambah-charge">
                    <i class="fa fa-plus mr-1"></i>
                    TAMBAH CHARGE
                </button>
            </div>
            <table id="table-pos" class="table table-striped table-bordered responsive" style="width: 100%">
                <thead class="thead-dark">
                    <th>Charge</th>
                    <th>Price</th>
                    <th style="width: 10%;">Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="form-group row">
                <label for="" class="col-sm-8 col-form-label"></label>
                <label for="" class="col-sm-1 col-form-label">
                    Diskon
                </label>
                <div class="col-sm-3">
                    <input name="input-diskon" type="number" id="input-diskon" class="form-control" oninput="diskon()">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-8 col-form-label"></label>
                <label for="" class="col-sm-1 col-form-label">
                    Total
                </label>
                <div class="col-sm-3">
                    <label name="label-total" id="label-total" class="form-control"></label>
                    <input name="input-total" id="input-total" class="form-control" hidden>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-10 col-form-label"></label>
                    <button type="button" style="width:15%; justify-content:center;" class="btn btn-danger ml-1">Bayar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Booking --}}
<div class="modal fade" id="modal-booking" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-charge">Data Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <div style="overflow-x: auto;">
                    <table id="table-booking" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nopol</th>
                                <th>Customer</th>
                                <th>Tgl. Ambil</th>
                                <th>Tgl. Kembali</th>
                                <th>Bayar</th>
                                <th>Kurang</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Charge --}}
<div class="modal fade" id="modal-tambah-charge" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-charge">Tambah Charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-charge" class="table table-striped table-bordered responsive" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Charge</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-script')
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/pos.js')}}"></script>
@endsection
