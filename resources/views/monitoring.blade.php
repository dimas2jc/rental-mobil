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
                        <tbody>
                            @foreach($data as $d1)
                                <tr>
                                    <td>{{ $d1->vehicles_type }}</td>
                                    <td>{{ $d1->date_start }}</td>
                                    <td>{{ $d1->name_sales }}</td>
                                    <td>{{ $d1->name_customer }}</td>
                                    <td>{{ $d1->date_start }}</td>
                                    <td>{{ $d1->date_finish }}</td>
                                    <td>{{ $d1->total_payment }}</td>
                                    @foreach($data2 as $d2)
                                        @if($d1->id_booking == $d2->id_booking)
                                            @if($d2->id_charge_vehicles == 1)
                                                <td>
                                                    {{ $d2->price_charge_vehicles }}
                                                </td>
                                            @endif
                                            @if($d2->id_charge_vehicles == 2)
                                                <td>
                                                    {{ $d2->price_charge_vehicles }}
                                                </td>
                                            @endif
                                            @if($d2->id_charge_vehicles == 5)
                                                <td>
                                                    {{ $d2->price_charge_vehicles }}
                                                </td>
                                            @endif
                                            @if($d2->id_charge_vehicles == 3)
                                                <td>
                                                    {{ $d2->price_charge_vehicles }}
                                                </td>
                                            @endif
                                            @if($d2->id_charge_vehicles == 4)
                                                <td>
                                                    {{ $d2->price_charge_vehicles }}
                                                </td>
                                            @endif    
                                        @endif
                                    @endforeach
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
