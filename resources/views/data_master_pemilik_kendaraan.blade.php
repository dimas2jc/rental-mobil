@extends('data_master')
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>Daftar Pemilik Kendaraan</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-pemilik_kendaraan" data-toggle="modal" data-target="#modal-tambah-pemilik_kendaraan">
                <i class="fa fa-plus mr-1"></i>
                TAMBAH BARU
            </button>
        </div>
        <table id="table-pemilik-kendaraan" class="table table-striped table-bordered responsive" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- Modal Pemilik Kendaraan --}}
<div class="modal fade" id="modal-tambah-pemilik_kendaraan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formPemilikKendaraan" method="POST" class="needs-validation" novalidate>
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
                            Alamat
                        </label>
                        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi alamat dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi email dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. HP
                        </label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nomor hp dengan benar.
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
    <script src="{{asset('assets/js/custom/data_master_pemilik_kendaraan.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
