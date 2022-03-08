@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pos_tab" role="tabpanel" aria-labelledby="pos_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Pembayaran</h5>
                </div>
                <form action="" id="formPembayaran" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">
                            Booking
                        </label>
                        <div class="col-sm-5">
                            <select class="form-control select-component select-booking" id="booking" name="booking" required>
                            </select>
                        </div>
                    </div>
                </form>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-charge" data-toggle="modal" data-target="#modal-tambah-charge">
                    <i class="fa fa-plus mr-1"></i>
                    TAMBAH CHARGE
                </button>
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
                <table id="table-charge" class="table table-striped table-bordered" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Charge</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
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
