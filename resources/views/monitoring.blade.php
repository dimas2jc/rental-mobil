@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="monitoring_tab" role="tabpanel" aria-labelledby="monitoring_tab-tab">
                <div class="judul-tabel mb-3">
                    <h5>Monitoring Keuangan</h5>
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
                                <th rowspan="2" class="text-center">Charge</th>
                                <th rowspan="2">Total Price + Charge</th>
                                <th rowspan="2">Down Paytment</th>
                                <th rowspan="2">Cash / TF</th>
                                <th rowspan="2">Paid / Remaining Payment</th>
                            </tr>
                            <tr>
                                <th>Ambil</th>
                                <th>Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d1)
                                <tr>
                                    <td>{{ $d1->vehicles_type }}</td>
                                    <td>{{ $d1->date }}</td>
                                    <td>{{ $d1->name_sales }}</td>
                                    <td>{{ $d1->name_customer }}</td>
                                    <td>{{ date("d-m-Y", strtotime($d1->date_start)) }}</td>
                                    <td>{{ date("d-m-Y", strtotime($d1->date_finish)) }}</td>
                                    <td>{{ $d1->price_sales }}</td>
                                    <td>{{ $d1->total_charge }}</td>
                                    <td>{{ $d1->price_sales + $d1->total_charge }}</td>
                                    <td>{{ $d1->total }}</td>
                                    @if($d1->bukti != null)
                                    <td>TF</td>
                                    @else
                                    <td>Cash</td>
                                    @endif
                                    <td>{{ $d1->price_sales - $d1->total }}</td>
                                </tr>
                            @endforeach
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
    <script src="{{asset('assets/js/custom/monitoring.js')}}"></script>
@endsection
