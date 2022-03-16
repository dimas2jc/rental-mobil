@extends('data_master')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
@endsection

@section('content-data-master')

<div class="card">
    <div class="card-body">
        @if(session()->has('message'))
        {{-- <div class="row col-md-12"> --}}
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ti-close"></i>
                </button>
            </div>
        {{-- </div> --}}
        @endif
        <a href="#" class="app-sidebar-menu-button btn btn-outline-light">
            <i data-feather="menu"></i>
        </a>
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="customer_tab-tab" data-toggle="tab" href="#customer_tab" role="tab"
                aria-controls="customer_tab" aria-selected="true">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="customer_b_tab-tab" data-toggle="tab" href="#customer_b_tab" role="tab"
                aria-controls="customer_b_tab" aria-selected="false">Customer Blacklist</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="customer_tab" role="tabpanel" aria-labelledby="customer_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Customer</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-customer" data-toggle="modal" data-target="#modal-tambah-customer">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH BARU
                    </button>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-customer" class="table table-striped table-bordered responsive" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. KK</th>
                                <th>No. NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Sosmed</th>
                                <th>Email</th>
                                <th>Is Blacklist</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="customer_b_tab" role="tabpanel" aria-labelledby="customer_b_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Daftar Customer Blacklist</h5>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-customer-b" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <th>No. KK</th>
                            <th>No. NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Sosmed</th>
                            <th>Email</th>
                            <th>Is Blacklist</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Customer --}}
<div class="modal fade" id="modal-tambah-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="judul-modal-customer"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <div style="overflow-y: auto;">
                <form action="" id="formCustomer" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Nama Customer
                            </label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi nama customer dengan benar.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                Sales
                            </label>
                            {{-- <div class="col-sm-9"> --}}
                                <select class="form-control select-component select-sales @error('sales') is-invalid @enderror" id="sales" name="sales" required>
                                    <option selected disabled>Pilih Sales . . </option>
                                    @foreach ($data['sales'] as $d)
                                        <option value="{{ $d->id_sales }}">{{ $d->name_sales }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Mohon isi sales dengan benar.
                                </div>
                            {{-- </div> --}}
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                                No. KK
                            </label>
                            <input type="text" name="no_kk" id="no_kk" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">
                            NIK
                            </label>
                            <input type="text" name="no_nik" id="no_nik" class="form-control @error('no_nik') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi NIK dengan benar.
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
                            Sosmed
                            </label>
                            <input type="text" name="sosmed" id="sosmed" class="form-control @error('sosmed') is-invalid @enderror">
                            <div class="invalid-feedback">
                                Mohon isi email dengan benar.
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
</div>

@endsection
@section('extra-script')
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master_customer.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
