<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>

    </div>


    <!-- Content Row -->
    <div class="row">

        <?php foreach ($prodi as $pr) : ?>
            <a class="col-xl-4 col-md-6 mb-4" href="<?= base_url($pr['url_lab']); ?>">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <?= $pr['nama_prodi']; ?>
                        <div class="text-white-50 small"><?= $pr['jurusan']; ?></div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>


</div>

<!-- Content Row -->


</div>
<!-- End of Main Content -->