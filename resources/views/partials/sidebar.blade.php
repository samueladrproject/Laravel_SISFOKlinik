<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISFO Klinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('master')
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- Nav Item - Data Pegawai -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-pegawai') }}">
                <i class="fas fa-hospital-user"></i>
                <span>Data Pegawai</span></a>
        </li>

        <!-- Nav Item - Data Tindakan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-tindakan') }}">
                <i class="fas fa-hand-holding-medical"></i>
                <span>Data Tindakan</span></a>
        </li>

        <!-- Nav Item - Data Obat -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-obat') }}">
                <i class="fas fa-first-aid"></i>
                <span>Data Obat</span></a>
        </li>

        <!-- Nav Item - Data User -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-user') }}">
                <i class="fas fa-user"></i>
                <span>Data User</span></a>
        </li>

        <!-- Nav Item - Data Wilayah -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-wilayah') }}">
                <i class="fas fa-map-marked-alt"></i>
                <span>Data Wilayah</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Transaksi
        </div>

        <!-- Nav Item - Data Pasien -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('data-pasien') }}">
                <i class="fa-solid fa-book-medical"></i>
                <span>Data Pasien</span></a>
        </li>

        <!-- Nav Item - Tindakan dan Obat -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fa-solid fa-file-medical"></i>
                <span>Detail Pasien</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('/data-tindakan-pasien') }}">Tindakan Pasien</a>
                    <a class="collapse-item" href="{{ URL::to('/data-obat-pasien') }}">Obat Pasien</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block my-0">

        <!-- Nav Item - Data Tagihan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/info-tagihan') }}">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Informasi Tagihan Pasien</span></a>
        </li>

        <!-- Nav Item - Data Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/laporan') }}">
                <i class="fa-solid fa-file-pdf"></i>
                <span>Laporan</span></a>
        </li>
    @endcan

    @can('admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- Nav Item - Data Pegawai -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-pegawai') }}">
                <i class="fas fa-hospital-user"></i>
                <span>Data Pegawai</span></a>
        </li>

        <!-- Nav Item - Data Tindakan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-tindakan') }}">
                <i class="fas fa-hand-holding-medical"></i>
                <span>Data Tindakan</span></a>
        </li>

        <!-- Nav Item - Data Obat -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/data-obat') }}">
                <i class="fas fa-first-aid"></i>
                <span>Data Obat</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Transaksi
        </div>

        <!-- Nav Item - Data Pasien -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('data-pasien') }}">
                <i class="fa-solid fa-book-medical"></i>
                <span>Data Pasien</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block my-0">

        <!-- Nav Item - Data Tagihan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/info-tagihan') }}">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Informasi Tagihan Pasien</span></a>
        </li>

        <!-- Nav Item - Data Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/laporan') }}">
                <i class="fa-solid fa-file-pdf"></i>
                <span>Laporan</span></a>
        </li>

        <!-- Divider -->
    @endcan

    @can('user')
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Transaksi
        </div>

        <!-- Nav Item - Tindakan dan Obat -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fa-solid fa-file-medical"></i>
                <span>Detail Pasien</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('/data-tindakan-pasien') }}">Tindakan Pasien</a>
                    <a class="collapse-item" href="{{ URL::to('/data-obat-pasien') }}">Obat Pasien</a>
                </div>
            </div>
        </li>
    @endcan
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
