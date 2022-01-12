<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('admin/excel_aset') ?>" class="btn btn-success mb-3">Export Data Excel</a>
    <a href="<?= base_url('admin/pdf_aset') ?>" class="btn btn-danger mb-3">Export Data PDF</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelapor</th>
                            <th scope="col">Tanggal Lapor</th>
                            <th scope="col">Nama Aset</th>
                            <!-- <th scope="col">Lokasi</th>
                            <th scope="col">Prodi</th> -->
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggapan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Beri Tanggapam</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataPelaporan as $dp) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $dp['nama']; ?></td>
                                <td><?= $dp['tgl_lapor']; ?></td>
                                <td><?= $dp['nama_barang']; ?></td>
                                <td><?= $dp['deskripsi_laporan']; ?></td>
                                <td><?= $dp['tanggapan']; ?></td>
                                <td>
                                    <center><?php
                                            if ($dp['tanggapan'] == "") { ?>
                                            <a href="" class="text-danger"><i class="fas fa-minus-circle"></i></i></a>
                                            <!-- $st = "Belum ditanggapi"; -->
                                        <?php } else { ?>
                                            <a href="" class="text-success"><i class="fas fa-check-circle"></i></i></a>
                                            <!-- $st = "Sudah ditanggapi"; -->
                                        <?php } ?>
                                    </center>
                                </td>
                                <td>
                                    <center><a href="<?php echo base_url() . 'admin/formTanggapan/' . $dp['id_laporan']; ?>" class="btn btn-warning mb-3"><i class="fas fa-reply"></i></a></center>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary mb-3"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger mb-3"><i class="far fa-trash-alt"></i></a>
                                </td>

                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Data-->