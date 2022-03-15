@extends('data_master')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>Daftar Pelayanan</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-service" data-toggle="modal" data-target="#modal-tambah-service">
                <i class="fa fa-plus mr-1"></i>
                TAMBAH BARU
            </button>
        </div>
        <table id="table-service" class="table table-striped table-bordered responsive" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Service</th>
                    <th>status</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modal-tambah-service" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formService" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama pelayanan dengan benar.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-service').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.js') }}"></script>
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/custom/data_master_service.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
