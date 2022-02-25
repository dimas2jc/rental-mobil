@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="monitoring_tab" role="tabpanel" aria-labelledby="monitoring_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Tabel Monitoring</h5>
                </div>
                <div style="overflow-x: auto;">
                    <table id="table-monitoring" class="table table-striped table-bordered" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">Type Unit</th>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">Sales</th>
                                <th rowspan="2">User</th>
                                <th colspan="2" class="text-center">Time</th>
                                <th rowspan="2">Price User</th>
                                <th colspan="5" class="text-center">Charge</th>
                                <th rowspan="2">Total Price + Charge</th>
                                <th rowspan="2">Down Paytment</th>
                                <th rowspan="2">Cash / TF</th>
                                <th rowspan="2">Paid / Remaining Payment</th>
                                <th rowspan="2">Cash / TF</th>
                            </tr>
                            <tr>
                                <th>Ambil</th>
                                <th>Ambil</th>
                                <th>Over Time</th>
                                <th>Lintas Wilayah</th>
                                <th>Insiden</th>
                                <th>BBM</th>
                                <th>Car Wash</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/monitoring.js')}}"></script>
@endsection
