@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <form action="" id="formPembayaran" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="tab-pane fade show active mb-3" id="pos_tab" role="tabpanel" aria-labelledby="pos_tab-tab">
                    <div class="judul-tabel mb-3">
                        <h5>Pembayaran</h5>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">
                                Booking
                            </label>
                            <div class="col-sm-4">
                                <label name="label-booking" id="label-booking" class="form-control" style="cursor: pointer;" data-toggle="modal" data-target="#modal-booking">-- Pilih Booking --</label>
                                <input name="inputBooking" id="inputBooking" class="form-control" hidden>
                                <input name="idBooking" id="idBooking" class="form-control" hidden>
                            </div>
                            <div class="col-1"></div>
                            <label for="" class="col-sm-1 col-form-label">
                                Sub Total
                            </label>
                            <div class="col-sm-4">
                                <label name="label-subTotal" id="label-subTotal" class="form-control"></label>
                                <input name="inputSubtotal" id="inputSubtotal" class="form-control" hidden>
                            </div>
                        </div>
                    <button type="button" class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-charge" data-toggle="modal" data-target="#modal-charge">
                        <i class="fa fa-plus mr-1"></i>
                        CHARGE
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
                        <input name="inputDiskon" type="text" id="inputDiskon" class="form-control" oninput="diskon()">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-8 col-form-label"></label>
                    <label for="" class="col-sm-1 col-form-label">
                        Total
                    </label>
                    <div class="col-sm-3">
                        <label name="label-total" id="label-total" class="form-control"></label>
                        <input name="inputTotal" id="inputTotal" class="form-control" hidden>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-10 col-form-label"></label>
                    <button type="submit" style="width:15%; justify-content:center;" class="btn btn-danger ml-1" id="bayar">Bayar</button>
                </div>
            </form>
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
<div class="modal fade" id="modal-charge" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-charge">Charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary mb-3 mt-0" id="modalCharge">
                    <i class="fa fa-plus mr-1"></i>Tambah Charge
                </button>
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

{{-- Modal Tambah Charge --}}
<div class="modal fade" id="modal-tambah-charge" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-charge">Tambah Charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formCharge" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Charge
                        </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama charge dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Harga Charge
                        </label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi harga charge dengan benar.
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-charge').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('extra-script')
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/pos.js')}}"></script>
@endsection
