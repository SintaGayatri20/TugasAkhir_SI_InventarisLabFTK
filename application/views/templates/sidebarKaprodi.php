<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i><img src="<?php echo base_url('asset/logo_undiksha.png'); ?>" width="65" height="65" alt=""></i>
        </div>
        <div class="sidebar-brand-text mx-3">SILAB <sup>FTK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!---QUERY MENU-->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('kaprodi'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Koorprodi</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('kaprodi/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data-Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('kaprodi/formPilihAsetRuangan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-university"></i>
            <span>Data Barang Ruangan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringPeminjaman" aria-expanded="true" aria-controls="monitoringPeminjaman">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Approve Peminjaman</span>
        </a>
        <div id="monitoringPeminjaman" class="collapse" aria-labelledby="monitoringPeminjaman" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Approve Peminjaman :</h6>
                <a class="collapse-item" href="<?= base_url('kaprodi/daftarpeminjamanalat'); ?>">Peminjaman Alat</a>
                <!-- <a class="collapse-item" href="<?= base_url('Lpeminjaman/barang_dikembalikan'); ?>">Peminjaman Ruangan</a> -->
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('kaprodi/brgRusakRuangan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-box"></i>
            <span>Barang Rusak Ruanga</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('kaprodi/data_pelaporan'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-file"></i>
            <span>Pelaporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->