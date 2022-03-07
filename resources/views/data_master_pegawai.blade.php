@extends('data_master')
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <a href="#" class="app-sidebar-menu-button btn btn-outline-light">
            <i data-feather="menu"></i>
        </a>
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pegawai_tab-tab" data-toggle="tab" href="#pegawai_tab" role="tab"
                aria-controls="pegawai_tab" aria-selected="true">Pegawai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sales_tab-tab" data-toggle="tab" href="#sales_tab" role="tab"
                aria-controls="sales_tab" aria-selected="false">Sales</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="pegawai_tab" role="tabpanel" aria-labelledby="pegawai_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Pegawai</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-pegawai" data-toggle="modal" data-target="#modal-tambah-pegawai">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <table id="table-pegawai" class="table table-striped table-bordered responsive" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Status</th>
                            <th style="width: 10%">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="tab-pane fade" id="sales_tab" role="tabpanel" aria-labelledby="sales_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Sales</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-sales" data-toggle="modal" data-target="#modal-tambah-sales">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <table id="table-sales" class="table table-striped table-bordered responsive" style="width: 100%">
                    <thead class="thead-dark">
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Status</th>
                        <th style="width: 10%">Actions</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Pegawai --}}
<div class="modal fade" id="modal-tambah-pegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-pegawai"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formPegawai" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Pegawai
                        </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama pegawai dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Password
                        </label>
                        <input type="password" name="pass" id="pass" class="form-control @error('pass') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi password pegawai dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Email
                        </label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi email dengan benar.
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
                            No. HP
                        </label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nomor hp dengan benar.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-pegawai').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Sales --}}
<div class="modal fade" id="modal-tambah-sales" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-sales"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formSales" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Sales
                        </label>
                        <input type="text" name="name" id="name_sales" class="form-control @error('name') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama Sales dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Password
                        </label>
                        <input type="password" name="pass" id="pass" class="form-control @error('pass') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi password pegawai dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Email
                        </label>
                        <input type="text" name="email_sales" id="email_sales" class="form-control @error('email_sales') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi email dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="alamat" id="alamat_sales" class="form-control @error('alamat') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi alamat dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. HP
                        </label>
                        <input type="text" name="phone" id="phone_sales" class="form-control @error('phone') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nomor hp dengan benar.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-sales').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master_pegawai.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
