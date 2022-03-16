@extends('data_master')
@section('extra-css')
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
            <h5>Syarat & Ketentuan</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-ketentuan" data-toggle="modal" data-target="#modal-tambah-ketentuan">
                <i class="fa fa-plus mr-1"></i>
                TAMBAH BARU
            </button>
        </div>
        <table id="table-ketentuan" class="table table-striped table-bordered responsive" style="width: 100%">
            <thead class="thead-dark">
                <th>No</th>
                <th>Deskripsi</th>
                <th style="width: 10%">Actions</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Bodi --}}
<div class="modal fade" id="modal-tambah-ketentuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-ketentuan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formKetentuan" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Deskripsi
                        </label>
                        <textarea name="ketentuan" id="ketentuan" rows="5" class="form-control @error('ketentuan') is-invalid @enderror" required></textarea>
                        {{-- <input type="text" name="ketentuan" id="ketentuan" class="form-control @error('ketentuan') is-invalid @enderror" required> --}}
                        <div class="invalid-feedback">
                            Mohon isi deskripsi dengan benar.
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-ketentuan').modal('toggle');">BATAL</button>
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
    <script src="{{asset('assets/js/custom/data_master_ketentuan.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
