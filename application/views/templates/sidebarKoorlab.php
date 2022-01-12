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
        <a class="nav-link" href="<?= base_url('koorlab'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Koorlab</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('koorlab/profile'); ?>">
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
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterData" aria-expanded="true" aria-controls="masterData">
            <i class="fas fa-fw fa-table"></i>
            <span>Barang Habis Pakai</span>
        </a>
        <div id="masterData" class="collapse" aria-labelledby="masterData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data:</h6>
                <a class="collapse-item" href="<?= base_url('koorlab/barangHabisPakai'); ?>">Data Barang Habis Pakai</a>
                <a class="collapse-item" href="<?= base_url('koorlab/pengadaanBHP'); ?>">Pengadaan BHP</a>
            </div>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('koorlab/barangHabisPakai'); ?>" aria-expanded="true">
            <!-- <i class="fas fa-fw fa-university"></i> -->
            <i class="fas fa-fw fa-luggage-cart"></i>
            <span>Pengadaan BHP</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('koorlab/perbaikanAsetRusak'); ?>" aria-expanded="true">
            <!-- <i class="fas fa-fw fa-university"></i> -->
            <!-- <i class="fas fa-luggage-cart"></i> -->
            <i class="fas fa-fw fa-tools"></i>
            <span>Perbaikan Aset</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('koorlab/data_pelaporan_koorlab'); ?>" aria-expanded="true">
            
            <i class="fas fa-file"></i>
            <span>Data Pelaporan</span>
        </a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->