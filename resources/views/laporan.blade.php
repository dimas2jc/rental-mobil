@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="laporan_tab" role="tabpanel" aria-labelledby="laporan_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Tabel Laporan</h5>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-laporan" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Type Unit</th>
                                <th rowspan="2">Customer</th>
                                <th rowspan="2">Sales</th>
                                <th colspan="2" class="text-center">Time</th>
                                <th rowspan="2">Price User</th>
                                <th rowspan="2">Komisi Sales</th>
                                <th rowspan="2">Down Paytment</th>
                                <th rowspan="2">Terbayar</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Ambil</th>
                                <th class="text-center">Kembali</th>
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
    <script src="{{asset('assets/js/custom/laporan.js')}}"></script>
@endsection
