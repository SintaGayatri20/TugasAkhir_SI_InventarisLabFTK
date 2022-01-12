<?php
$status = $this->session->userdata('status');

if ($status == 1) {

    $st = 'Dosen';
} else {
    $st = 'Mahasiswa';
}

?>

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
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard <?php echo $st; ?></span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user/profile'); ?>">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Daftars" aria-expanded="true" aria-controls="Pinjam">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Peminjaman</span>
        </a>
        <div id="Daftars" class="collapse" aria-labelledby="masterData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Form Peminjaman:</h6>
                <a class="collapse-item" href="<?= base_url('user/formpeminjamanalat'); ?>">Pinjam Alat</a>
                <!-- <a class="collapse-item" href="#">Pinjam Ruangan</a> -->

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('user/isidatabl'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Isi Data Surat Bebas Lab</span></a>
    </li>






    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->