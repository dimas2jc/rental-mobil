@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pembayaran_tab" role="tabpanel" aria-labelledby="pembayaran_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Tabel Pembayaran</h5>
                    <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-pembayaran">
                        <i class="fa fa-plus mr-1"></i>
                        TAMBAH PEMBAYARAN
                    </button>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-pembayaran" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">ID Booking</th>
                                <th rowspan="2">Type Unit</th>
                                <th rowspan="2">Customer</th>
                                <th rowspan="2">Sales</th>
                                <th rowspan="2">User</th>
                                <th rowspan="2">Date</th>
                                <th colspan="2" class="text-center">Time</th>
                                <th rowspan="2">Price User</th>
                                <th rowspan="2">Down Paytment</th>
                                <th rowspan="2">Paid / Remaining Payment</th>
                                <th rowspan="2">Cash / TF</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Ambil</th>
                                <th>Kembali</th>
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

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/pembayaran.js')}}"></script>
@endsection
