@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="judul-tabel mb-3">
                        <h5>Detail Booking</h5>
                        @if($detail->status_booking == "Diambil")
                        <a href="{{ url('print/checklist/'.$detail->id_booking) }}"><button class="btn btn-sm btn-rounded bg-dribbble ml-auto cetak-checklist">
                            <i class="fa fa-plus mr-1"></i>
                            Print Checklist
                        </button></a>
                        @endif
                    </div>
                    <div style="overflow-x: auto;">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Customer</td>
                                    <td>: {{ $detail->name_customer }}</td>
                                </tr>
                                <tr>
                                    <td>Sales</td>
                                    <td>: {{ $detail->name_sales }}</td>
                                </tr>
                                <tr>
                                    <td>Kendaraan</td>
                                    <td>: {{ $detail->kendaraan }}</td>
                                </tr>
                                <tr>
                                    <td>Nopol</td>
                                    <td>: {{ $detail->nopol }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Ambil</td>
                                    <td>: {{ date("d-m-Y", strtotime($detail->date_start)) }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td>
                                    <td>: {{ date("d-m-Y", strtotime($detail->date_finish)) }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: {{ $detail->status }}</td>
                                </tr>
                                <tr>
                                    <td>DP</td>
                                    <td>: {{ number_format(floatval($detail->dp_sales),0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <td>Bukti</td>
                                    <td>: <a href="{{ url('bukti/'.$detail->id_booking) }}" target="_blank">{{ $detail->bukti }}</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="judul-tabel mb-3">
                        <h5>Checklist</h5>
                    </div>
                    <a href="#" class="app-sidebar-menu-button btn btn-outline-light">
                        <i data-feather="menu"></i>
                    </a>
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="ambil-tab" data-toggle="tab" href="#ambil" role="tab"
                            aria-controls="ambil" aria-selected="true">Ambil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="kembali-tab" data-toggle="tab" href="#kembali" role="tab"
                            aria-controls="kembali" aria-selected="false">Sales</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="ambil" role="tabpanel" aria-labelledby="ambil-tab">
                            <div class="judul-tabel mb-3">
                                <h5>Ambil</h5>
                                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-ambil" data-toggle="modal" data-target="#modal-ambil">
                                    <i class="fa fa-plus mr-1"></i>
                                    Cek Ambil
                                </button>
                            </div>
                            <table id="table-ambil" class="table table-striped table-bordered responsive" style="width: 100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Cek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($checklist as $c)
                                        @if($c->status == 0)
                                        <tr>
                                            <td>{{ $c->nama }}</td>
                                            <td>{{ $c->cek }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="kembali_tab" role="tabpanel" aria-labelledby="sales_tab-tab">
                            <div class="judul-tabel mb-3">
                                <h5>Kembali</h5>
                                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-kembali" data-toggle="modal" data-target="#modal-kembali">
                                    <i class="fa fa-plus mr-1"></i>
                                    Cek Kembali
                                </button>
                            </div>
                            <table id="table-kembali" class="table table-striped table-bordered responsive" style="width: 100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Cek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($checklist as $c)
                                        @if($c->status == 1)
                                        <tr>
                                            <td>{{ $c->nama }}</td>
                                            <td>{{ $c->cek }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ambil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Checklist Ambil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="{{ url('/checklist'.'/'.$detail->id_booking) }}" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="status" value="0">
                    <table id="table-kembali" class="table table-striped table-bordered responsive" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Cek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($form_checklist as $key => $fc)
                                <tr>
                                    <td>{{ $fc->nama }}</td>
                                    <td><input type="checkbox" name="checklist[{{ $key }}]"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-ambil').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-kembali" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Checklist Ambil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-circle text-danger"></i>
                </button>
            </div>
            <form action="{{ url('/checklist'.'/'.$detail->id_booking) }}" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <table id="table-kembali" class="table table-striped table-bordered responsive" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Cek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($form_checklist as $key => $fc)
                                <tr>
                                    <td>{{ $fc->nama }}</td>
                                    <td><input type="checkbox" name="checklist[{{ $key }}]"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-google btn-sm" onclick="$('#modal-kembali').modal('toggle');">BATAL</button>
                    <button type="submit" class="btn btn-linkedin btn-sm">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/detail_list_booking.js')}}"></script>
@endsection
