<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a href="{{url('/')}}" id="booking">
                    <span class="nav-link-icon">
                        <i data-feather="calendar"></i>
                    </span>
                    <span>Jadwal Booking</span>
                </a>
            </li>

            @if (auth()->user()->role == 1)
            {{-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="dollar-sign"></i>
                    </span>
                    <span>Keuangan</span>
                </a>
                <ul>
                    <li>
                        <li>
                            <a href="#">
                                <span>Invoice</span>
                            </a>
                            <ul>
                                <li>
                                    <a id="tagihan_sewa" href="">Tagihan Sewa</a>
                                </li>
                                <li>
                                    <a id="klaim" href="">Klaim</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                    <li>
                        <a id="kas_keluar" href="">Kas Keluar</a>
                    </li>
                </ul>
            </li> --}}

            <li>
                <a href="#" id="monitoring">
                    <span class="nav-link-icon">
                        <i data-feather="monitor"></i>
                    </span>
                    <span>Monitoring</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('/monitoring')}}">Monitoring</a>
                    </li>
                    <li>
                        <a href="{{url('/keuangan')}}">Keuangan</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{url('/pembayaran')}}" id="pembayaran">
                    <span class="nav-link-icon">
                        <i data-feather="dollar-sign"></i>
                    </span>
                    <span>Pembayaran</span>
                </a>
            </li>

            <li>
                <a href="{{url('/laporan')}}" id="laporan">
                    <span class="nav-link-icon">
                        <i data-feather="file-text"></i>
                    </span>
                    <span>Laporan</span>
                </a>
            </li>

            <li>
                <a href="{{url('/data_master')}}" id="data_master">
                    <span class="nav-link-icon">
                        <i data-feather="layers"></i>
                    </span>
                    <span>Data Master</span>
                </a>
            </li>
            @endif

            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="calendar"></i>
                    </span>
                    <span>Kendaraan</span>
                </a>
                <ul>
                    <li>
                        <a  href="orders.html">Semua Kendaraan</a>
                    </li>
                    <li>
                        <a  href="products.html">Tipe</a>
                    </li>
                </ul>
            </li> -->

        </ul>
    </div>
</div>
