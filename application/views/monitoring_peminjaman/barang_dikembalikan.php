<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?> -->
    <?= $this->session->flashdata('message'); ?>
    <a href="<?= base_url('admin/excel_aset') ?>" class="btn btn-success mb-3">Export Data Excel</a>
    <a href="<?= base_url('admin/pdf_aset') ?>" class="btn btn-danger mb-3">Export Data PDF</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Nama Barang Dipinjam</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col">Jumlah Barang Dipinjam</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($peminjaman as $pnjm) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $pnjm['name']; ?></td>
                                <td><?= $pnjm['nama_barang']; ?></td>
                                <td><?= $pnjm['spesifikasi']; ?></td>
                                <td><?= $pnjm['jumlah ']; ?></td>
                                <td><?= $pnjm['satuan']; ?></td>
                                <td><?= $pnjm['status']; ?></td>
                                <td><img src="<?php echo base_url() . 'assets/media/' . $pnjm['foto']; ?>" width="150" height="100" /></td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataAset/' . $pnjm['kode_aset']; ?>" class="text-success"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/deleteDataAset/' . $pnjm['kode_aset']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
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