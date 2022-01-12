<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon mt-3">
            <i><img src="<?php echo base_url('asset/logo_undiksha.png'); ?>" width="65" height="65" alt=""></i>
        </div>
        <div class="sidebar-brand-text mx-3">SILAB <sup>FTK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!---QUERY MENU-->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data-Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterData" aria-expanded="true" aria-controls="masterData">
            <i class="fas fa-fw fa-table"></i>
            <span>Master Data</span>
        </a>
        <div id="masterData" class="collapse" aria-labelledby="masterData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item" href="<?= base_url('admin/dataUserLogin'); ?>">Master Data User</a>
                <a class="collapse-item" href="<?= base_url('admin/dataUser'); ?>">Master Detail Data User</a>
                <a class="collapse-item" href="<?= base_url('admin/dataLokasi'); ?>">Master Data Lokasi</a>
                <a class="collapse-item" href="<?= base_url('admin/dataProdi'); ?>">Master Data Prodi</a>
                <a class="collapse-item" href="<?= base_url('admin/dataAset'); ?>">Master Data Aset</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataUser" aria-expanded="true" aria-controls="dataUser">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Users</span>
        </a>
        <div id="dataUser" class="collapse" aria-labelledby="dataUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Users:</h6>
                <a class="collapse-item" href="<?= base_url('AdminUser/user_mahasiswa'); ?>">Data Mahasiswa</a>
                <a class="collapse-item" href="<?= base_url('AdminUser/user_laboran'); ?>">Data Laboran</a>
                <a class="collapse-item" href="<?= base_url('AdminUser/user_kalab'); ?>">Data Koorlab</a>
                <a class="collapse-item" href="<?= base_url('AdminUser/user_kaprodi'); ?>">Data Koorprodi</a>
            </div>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('AdminBR/dataBarangRuangan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-university"></i>
            <span>Data Barang Ruangan</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('AdminBR/formPilihAsetRuangan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-university"></i>
            <span>Data Barang Ruangan</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" aria-expanded="true">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Data Peminjaman Ruangan</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterData1" aria-expanded="true" aria-controls="masterData1">
            <i class="fas fa-luggage-cart"></i></i>
            <span>Data Bahan Habis Pakai</span>
        </a>
        <div id="masterData1" class="collapse" aria-labelledby="masterData1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data:</h6>
                <a class="collapse-item" href="<?= base_url('admin/masterbhp'); ?>">Master Data BHP</a>
                <a class="collapse-item" href="<?= base_url('admin/barangHabisPakai'); ?>">Permohonan BHP</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/cetakSuratBebasLab'); ?>" aria-expanded="true">

            <i class="fas fa-fw fa-file-download"></i>
            <span>Surket Bebas Lab</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringPeminjaman" aria-expanded="true" aria-controls="monitoringPeminjaman">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Monitoring Peminjaman</span>
        </a>
        <div id="monitoringPeminjaman" class="collapse" aria-labelledby="monitoringPeminjaman" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Monitoring Peminjaman :</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/daftarpeminjamanalat'); ?>">Peminjaman Alat</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('AdminBR/brgRusakRuangan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Monitoring Aset Rusak</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/kopsurat'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Manajemen Kop Surat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/data_pelaporan_admin'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Pelaporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('login/logout'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->