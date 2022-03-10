@extends('data_master')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
    <style>
        .colnum {
            float: left;
            width: 50%;
            padding: 10px;
        }
    </style>
@endsection
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>Daftar Bodi Kendaraan</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-body" data-toggle="modal" data-target="#modal-tambah-body">
                <i class="fa fa-plus mr-1"></i>
                TAMBAH BARU
            </button>
        </div>
        <table id="table-body" class="table table-striped table-bordered responsive" style="width: 100%">
            <thead class="thead-dark">
                <th>Bodi</th>
                <th>Status</th>
                <th style="width: 10%">Actions</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Bodi --}}
<div class="modal fade" id="modal-tambah-body" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-body"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formBody" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama
                        </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kendaraan
                        </label>
                        <select class="form-control select-component select-kendaraan" id="kendaraan" name="id_vehicles">
                            <option selected disabled>Pilih kendaraan . . </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck" checked>
                            <label class="custom-control-label" for="customCheck">is Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-body').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/custom/data_master_body.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
