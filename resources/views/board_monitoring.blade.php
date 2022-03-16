@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="judul-tabel mb-3">
            <h5>Monitoring</h5>
            <button class="btn btn-sm btn-rounded bg-dribbble ml-auto"><a href="{{ url('closing') }}">
                <i class="fa fa-plus mr-1"></i>
                Tutup
            </a></button>
        </div>
        <div style="overflow-x: auto;">
            <table id="table-monitoring" class="table table-striped table-bordered responsive" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama Mobil</th>
                        <th class="text-center">Uraian</th>
                        <th colspan="3" class="text-center">Senin</th>
                        <th colspan="3" class="text-center">Selasa</th>
                        <th colspan="3" class="text-center">Rabu</th>
                        <th colspan="3" class="text-center">Kamis</th>
                        <th colspan="3" class="text-center">Jumat</th>
                        <th colspan="3" class="text-center">Sabtu</th>
                        <th colspan="3" class="text-center">Minggu</th>
                    </tr>
                    <tr>
                        <th>Tgl Sewa</th>
                        <th id="1"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="2"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="3"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="4"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="5"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="6"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                        <th id="7"></th>
                        <th>Waktu Ambil</th>
                        <th>Waktu Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $vehicle)
                        <tr>
                            <td rowspan="4">{{ $loop->iteration }}</td>
                            <td rowspan="4">{{ $vehicle['vehicle'] }}</td>
                            <td>Penyewa</td>
                            @foreach ($data['detail'] as $index => $detail)
                                @foreach ($date as $i => $tgl)
                                    @if($tgl[i] == date("d-m-Y", strtotime($detail[$index]->date_start)))
                                        <td>{{ $detail->name_customer }}</td>
                                        <td rowspan="2">{{ date("H:i", strtotime($detail->date_start)) }}</td>
                                        <td rowspan="2">{{ date("H:i", strtotime($detail->date_finish)) }}</td>
                                    @else
                                        <td></td>
                                        <td rowspan="2"></td>
                                        <td rowspan="2"></td>
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                        <tr>
                            <td>Sales</td>
                            @foreach ($data['detail'] as $detail)
                                @foreach ($date as $i => $tgl)
                                    @if($tgl[i] == date("d-m-Y", strtotime($detail[$index]->date_start)))
                                        <td>{{ $detail->name_sales }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                        <tr>
                            <td>DP</td>
                            @foreach ($data['detail'] as $detail)
                                @foreach ($date as $i => $tgl)
                                    @if($tgl[i] == date("d-m-Y", strtotime($detail[$index]->date_start)))
                                        <td>{{ $detail->dp }}</td>
                                        <td></td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                        <tr>
                            <td>Pelunasan</td>
                            @foreach ($data['detail'] as $detail)
                                @foreach ($date as $i => $tgl)
                                    @if($tgl[i] == date("d-m-Y", strtotime($detail[$index]->date_start)))
                                        <td>{{ $detail->pelunasan }}</td>
                                        <td></td>
                                        <td></td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/custom/board_monitoring.js')}}"></script>
@endsection
