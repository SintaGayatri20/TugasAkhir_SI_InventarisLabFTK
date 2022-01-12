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


    <div class="alert alert-block alert-info">
        <div class="row">

            <div class="col-sm-1">
                <img src="<?= base_url('assets/img/vaficon.png'); ?>" alt="" width="75px" height="75px">
            </div>
            <div class="col-sm-8">
                <div class="clearfix"><br>
                    <h4 class="card-title" style="color: black;">Selamat datang <b><?php echo $user['nama']; ?></b>, anda login sebagai <b><?= $aks; ?></b>. Selalu jaga kerahasiaan username dan password anda. </h4>
                </div>
            </div>
        </div>
    </div>


</div>
</div>


<!-- Content Row -->



<!-- End of Main Content -->