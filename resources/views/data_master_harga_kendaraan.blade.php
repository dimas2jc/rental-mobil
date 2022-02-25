@extends('data_master')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>Daftar Harga Kendaraan</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-harga" data-toggle="modal" data-target="#modal-tambah-harga">
                <i class="fa fa-plus mr-1"></i>
                TAMBAH BARU
            </button>
        </div>
        <table id="table-harga" class="table table-striped table-bordered responsive" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>No. Polisi</th>
                    <th>Varian</th>
                    <th>Kapasitas BBM</th>
                    <th>Harga</th>
                    <th>Waktu/Jam</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- Modal Harga Kendaraan --}}
<div class="modal fade" id="modal-tambah-harga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formHarga" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kendaraan
                        </label>
                        <select class="form-control select-component select-kendaraan @error('kendaraan') is-invalid @enderror" id="" name="kendaraan" required>
                            <option selected disabled>Pilih Kendaraan . . </option>
                            @foreach ($data as $d)
                                <option value="{{ $d->ID_VEHICLES }}">{{ $d->NOPOL }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon isi kendaraan dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Harga
                        </label>
                        <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi harga dengan benar.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Waktu/Jam
                        </label>
                        <input type="text" name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi waktu dengan benar.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="document.getElementById('insert-form-customer').reset(); $('#modal-tambah-customer').modal('toggle');">BATAL</button>
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
    <script src="{{asset('assets/js/custom/data_master_harga_kendaraan.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
