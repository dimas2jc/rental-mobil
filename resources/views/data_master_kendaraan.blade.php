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
        <a href="#" class="app-sidebar-menu-button btn btn-outline-light">
            <i data-feather="menu"></i>
        </a>
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="kendaraan_tab-tab" data-toggle="tab" href="#kendaraan_tab" role="tab"
                aria-controls="kendaraan_tab" aria-selected="true">Kendaraan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="varian_tab-tab" data-toggle="tab" href="#varian_tab" role="tab"
                aria-controls="varian_tab" aria-selected="false">Varian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bodi_tab-tab" data-toggle="tab" href="#bodi_tab" role="tab"
                aria-controls="bodi_tab" aria-selected="false">Bodi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dokumen_tab-tab" data-toggle="tab" href="#dokumen_tab" role="tab"
                aria-controls="dokumen_tab" aria-selected="false">Dokumen</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="kendaraan_tab" role="tabpanel" aria-labelledby="kendaraan_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Kendaraan</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-kendaraan" data-toggle="modal" data-target="#modal-tambah-kendaraan">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-kendaraan" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. Polisi</th>
                                <th>Pemilik</th>
                                <th>Varian</th>
                                <th>Body</th>
                                <th>Document</th>
                                <th>Warna</th>
                                <th>No Rangka</th>
                                <th>No Mesin</th>
                                <th>Tahun Pembuatan</th>
                                <th>No STNK</th>
                                <th>Nama STNK</th>
                                <th>Alamat STNK</th>
                                <th>No BPKB</th>
                                <th>Tanggal KIR</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="varian_tab" role="tabpanel" aria-labelledby="varian_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Varian Kendaraan</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-varian" data-toggle="modal" data-target="#modal-tambah-varian">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-varian" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <th>Varian</th>
                            <th>Tipe</th>
                            <th>Pabrikan</th>
                            <th>Silinder</th>
                            <th>Kapasitas AC</th>
                            <th>Tipe BBM</th>
                            <th>Kapasitas BBM</th>
                            <th>Rasio BBM</th>
                            <th>Jenis Transmisi</th>
                            <th>Konfigurasi Axle</th>
                            <th>Jumlah Sumbu</th>
                            <th>Ukuran Ban</th>
                            <th>Tempat Duduk</th>
                            <th>Catatan</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bodi_tab" role="tabpanel" aria-labelledby="bodi_tab-tab">
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
            <div class="tab-pane fade show" id="dokumen_tab" role="tabpanel" aria-labelledby="dokumen_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Dokumen Kendaraan</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-dokumen" data-toggle="modal" data-target="#modal-tambah-dokumen">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <table id="table-dokumen" class="table table-striped table-bordered responsive" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Kadaluarsa</th>
                            <th>Deskripsi</th>
                            <th style="width: 10%">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Kendaraan --}}
<div class="modal fade" id="modal-tambah-kendaraan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-kendaraan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formKendaraan" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="colnum">
                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Pemilik
                            </label>
                            <select class="form-control select-component select-pemilik" id="pemilik" name="pemilik">
                            </select>
                            <div class="invalid-feedback">
                                Mohon pilih pemilik dulu.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Dokumen
                            </label>
                            <select class="form-control select-component select-dokumen" id="dokumen" name="dokumen">
                            </select>
                            <div class="invalid-feedback">
                                Mohon pilih dokumen dulu.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Body
                            </label>
                            <select class="form-control select-component select-body" id="body" name="body">
                            </select>
                            <div class="invalid-feedback">
                                Mohon pilih body dulu.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Varian
                            </label>
                            <select class="form-control select-component select-varian" id="varian" name="varian">
                            </select>
                            <div class="invalid-feedback">
                                Mohon pilih varian dulu.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. Polisi
                            </label>
                            <input type="text" name="nopol" id="nopol" class="form-control @error('nopol') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi nomor polisi kendaraan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. Rangka
                            </label>
                            <input type="text" name="no_rangka" id="no_rangka" class="form-control @error('no_rangka') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi nomor rangka dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. Mesin
                            </label>
                            <input type="text" name="no_mesin" id="no_mesin" class="form-control @error('no_mesin') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi nomor mesin dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Warna
                            </label>
                            <input type="text" name="warna" id="warna" class="form-control @error('warna') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi warna dengan benar.
                            </div>
                        </div>

                    </div>

                    <div class="colnum">

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Tahun Pembuatan
                            </label>
                            <input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control @error('tahun_pembuatan') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi tahun pembuatan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. STNK
                            </label>
                            <input type="text" name="no_stnk" id="no_stnk" class="form-control @error('no_stnk') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi nomor STNK dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Nama STNK
                            </label>
                            <input type="text" name="nama_stnk" id="nama_stnk" class="form-control @error('nama_stnk') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi nama STNK dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Masa STNK
                            </label>
                            <input type="text" name="masa_stnk" id="masa_stnk" class="form-control @error('masa_stnk') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi Masa STNK dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Alamat STNK
                            </label>
                            <input type="text" name="alamat_stnk" id="alamat_stnk" class="form-control @error('alamat_stnk') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi alamat STNK dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. BPKB
                            </label>
                            <input type="text" name="no_bpkb" id="no_bpkb" class="form-control @error('no_bpkb') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi nomor BPKB dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Tanggal KIR
                            </label>
                            <input type="date" name="tgl_kir" id="tgl_kir" class="form-control @error('tgl_kir') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi tanggal KIR dengan benar.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="width: 100%;">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-kendaraan').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Varian --}}
<div class="modal fade" id="modal-tambah-varian" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-varian"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formVarian" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="colnum">
                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Nama Varian
                            </label>
                            <input type="text" name="name_varian" id="name_varian" class="form-control @error('name_varian') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi nama varian dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Tipe
                            </label>
                            <input type="text" name="type_varian" id="type_varian" class="form-control @error('type_varian') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi tipe dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Pabrikan
                            </label>
                            <input type="text" name="pabrikan" id="pabrikan" class="form-control @error('pabrikan') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi pabrikan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Silinder
                            </label>
                            <input type="text" name="silinder" id="silinder" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Kapasitas CC
                            </label>
                            <input type="number" name="kapasitas_cc" id="kapasitas_cc" class="form-control @error('kapasitas_cc') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi pabrikan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Tipe BBM
                            </label>
                            <input type="text" name="tipe_bbm" id="tipe_bbm" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Kapasitas BBM
                            </label>
                            <input type="number" name="kapasitas_bbm_varian" id="kapasitas_bbm_varian" class="form-control @error('kapasitas_bbm_varian') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi pabrikan dengan benar.
                            </div>
                        </div>
                    </div>

                    <div class="colnum">
                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Rasio BBM
                            </label>
                            <input type="text" name="rasio_bbm" id="rasio_bbm" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Jenis Transmisi
                            </label>
                            <input type="text" name="jenis_transmisi" id="jenis_transmisi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Konfigurasi Axle
                            </label>
                            <input type="text" name="konfigurasi_axle" id="konfigurasi_axle" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Jumlah Sumbu
                            </label>
                            <input type="number" name="jumlah_sumbu" id="jumlah_sumbu" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Ukuran Ban
                            </label>
                            <input type="number" name="ukuran_ban" id="ukuran_ban" class="form-control" class="form-control @error('ukuran_ban') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi pabrikan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Tempat Duduk
                            </label>
                            <input type="number" name="vehicle_sit" id="vehicle_sit" class="form-control" class="form-control @error('vehicle_sit') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi pabrikan dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Catatan
                            </label>
                            <textarea name="note" id="note" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-varian').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
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

{{-- Modal Dokumen --}}
<div class="modal fade" id="modal-tambah-dokumen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-dokumen"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="" id="formDokumen" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama
                        </label>
                        <input type="text" name="name_dokumen" id="name_dokumen" class="form-control @error('name_dokumen') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Tipe
                        </label>
                        <input type="text" name="type_dokumen" id="type_dokumen" class="form-control @error('type_dokumen') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi tipe dokumen dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Tanggal Kadaluarsa
                        </label>
                        <input type="date" name="expired_date" id="expired_date" class="form-control @error('expired_date') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi tanggal kadaluarsa dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            File
                        </label>
                        <input type="file" name="file" id="file" accept="application/*" class="form-control @error('file') is-invalid @enderror">
                        <div class="invalid-feedback">
                            Mohon isi file dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-tambah-dokumen').modal('toggle');">BATAL</button>
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
    <script src="{{asset('assets/js/custom/data_master_kendaraan.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
