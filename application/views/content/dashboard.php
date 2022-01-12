<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Selamat Datang Di Sistem Informasi Inventeris Lab FTK</b></h1>

    </div>

    <?php

    $is_admin = $this->session->userdata('is_admin');

    if ($is_admin == 1) {

        $aks = 'Administrator';
    } else {
        $aks = $user['role'];
    }

    ?>
    <!-- Content Row -->
    <div class="row row-cols-1 row-cols-md-3 lg-3">
        <div class="col">
            <div class="card h-100 bg-info">
                <div class="card-body">
                    <h5 class="card-title" style="color: black;">Selamat Datang <b><?php echo $user['nama']; ?></b>, anda login sebagai <b><?= $aks; ?></b>. Selalu jaga kerahasiaan username dan password anda. </h5>
                    <p class="card-text" style="color: white;">Berikut ini adalah layanan sistem yang bisa digunakan</p>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>

    <div class="row">



        <a href="<?= base_url('admin/dataProdi') ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/univ.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 10px 10px 10px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Data Prodi
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>
        <a href="<?php echo base_url('admin/daftarpeminjamanalat'); ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/pjm.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 10px 10px 10px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Monitoring Peminjaman Barang
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>
        <a href="admin/dataLokasi" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/rgn.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 10px 10px 10px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Data Ruangan Laboratorium
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>

        <a href="<?= base_url('AdminBR/brgRusakRuangan'); ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/rsk.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 7px 7px 7px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Monitoring Aset Rusak
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>
        <!-- <a href="<?= base_url('admin/aset'); ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/ast.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 7px 7px 7px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Manajemen Aset
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a> -->
        <a href="<?= base_url('AdminBR/formPilihAsetRuangan') ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/dp.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 7px 7px 7px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Manajemen Data Aset Ruangan
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>
        <a href="admin/dataUser" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/usr.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 7px 7px 7px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Manajemen Users
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>
        <a href="<?= base_url('admin/data_pelaporan_admin'); ?>" target="_blank" style="margin: 0 auto; ">

            <div class="card border-info" style="margin-bottom: 20px;box-shadow: 0 0 12px 0 rgba(0,0,0,0.06),0 1px 0 0 rgba(0,0,0,0.02);">

                <div style="width:200px;height:170px;padding: 10px; margin: 0 auto;">
                    <img class="img-fluid" style="width:100%; height:150px;margin:0 auto;" src="<?php echo base_url('assets/img/dp2.png') ?>">
                </div>

                <div class="card-block" style="padding: 0px 7px 7px 7px;">
                    <p class="card-text" style="overflow-y:auto; max-height: 50px;text-align:center;min-height: 50px;min-width: 215px;max-width: 215px;">
                        Data Pelapran
                    </p>
                </div>

                <div class=" card-block card-inverse text-xs-center" style="padding: 0rem;">

                </div>


            </div>
        </a>


    </div>
</div>

<!-- Content Row -->



<!-- End of Main Content -->