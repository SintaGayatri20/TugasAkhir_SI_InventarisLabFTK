<?php


$status = $this->session->userdata('status');

if ($status == 1) {

    $st = 'Dosen';
} else {
    $st = 'Mahasiswa';
}

//foreach($user as $u);

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang Di Sistem Informasi Inventeris Lab FTK</h1>

    </div>


    <div class="alert alert-block alert-info fade in">
        <div class="row">

            <div class="col-sm-1">
                <img src="<?= base_url('assets/img/vaficon.png'); ?>" alt="" width="75px" height="75px">
            </div>
            <div class="col-sm-8">
                <div class="clearfix"><br>
                    <h4 class="card-title" style="color: black;">Selamat datang <b><?php echo $user['nama']; ?></b>, anda login sebagai <b><?= $st; ?></b>. Selalu jaga kerahasiaan username dan password anda. </h4>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">

        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a href="#" data-toggle="modal" data-target="#Peminjaman" class="card-body">
                    <center>
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-0">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-0">
                                    <h6><i class="fas fa-pencil-alt fa-2x text-secondary-300"></i> <b>ISI DATA PEMINJAMAN</b></h6>
                                </div>
                            </div>

                        </div>
                    </center>
                </a>
            </div>

        </div>
        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a href="#" data-toggle="modal" data-target="#Daftar" class="card-body">
                    <center>
                        <div class="row no-gutters align-items-center">
                            <div class="col ml-0">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-0">
                                    <h6><i class="fas fa-list fa-2x text-secondary-300"></i> <b>DAFTAR PEMINJAMAN</b></h6>
                                </div>
                            </div>
                    </center>

            </div>
            </a>
        </div>
    </div>

</div>

<!-- Content Row -->
<br><br>

</div>
<!-- End of Main Content -->

<div id="Peminjaman" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Pilih Peminjaman</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="alert alert-success" role="alert">
                        <b><a href=<?php echo base_url('user/formpeminjamanalat'); ?>><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                Peminjaman Alat</a></b>
                    </div>
                    <!-- <div class="alert alert-success" role="alert">
                        <b><a href=<?php echo base_url('user/formpeminjamanruangan') ?>><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                Peminjaman Ruangan</a></b>
                    </div> -->
                </div>
            </div>
            <!--div class="modal-footer">
               <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </!--div-->
        </div>
    </div>
</div>


<div id="Daftar" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Daftar Peminjaman</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="alert alert-success" role="alert">
                        <b><a href=<?php echo base_url('user/daftarpeminjamanalat'); ?>><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                Peminjaman Alat</a></b>
                    </div>
                    <!-- <div class="alert alert-success" role="alert">
                        <b><a href=<?php echo base_url($user['role']) ?>><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                Peminjaman Ruangan</a></b>
                    </div> -->
                </div>
            </div>
            <!--div class="modal-footer">
               <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </!--div-->
        </div>
    </div>
</div>