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
                <a class="nav-link" id="customer_tab-tab" data-toggle="tab" href="#customer_tab" role="tab"
                aria-controls="customer_tab" aria-selected="false">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="vendor_tab-tab" data-toggle="tab" href="#vendor_tab" role="tab"
                aria-controls="vendor_tab" aria-selected="false">Vendor</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="pegawai_tab" role="tabpanel" aria-labelledby="pegawai_tab-tab">
                <table id="table-pegawai" class="table table-bordered table-striped table-responsive-stack">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dimas</td>
                            <td>dimas@gmail.com</td>
                            <td align="center">
                                <button class="btn btn-success">AKTIF</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="customer_tab" role="tabpanel" aria-labelledby="customer_tab-tab">
                <table id="table-customer" class="table table-bordered table-striped table-responsive-stack">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dimas</td>
                            <td>dimas@gmail.com</td>
                            <td align="center">
                                <button class="btn btn-success">AKTIF</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="vendor_tab" role="tabpanel" aria-labelledby="vendor_tab-tab">
                <table id="table-vendor" class="table table-bordered table-striped table-responsive-stack">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dimas</td>
                            <td>dimas@gmail.com</td>
                            <td align="center">
                                <button class="btn btn-success">AKTIF</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master_user.js')}}"></script>
@endsection
