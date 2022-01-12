<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

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
                            <th scope="col">Lokasi</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Pinjam</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataAset as $as) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $as['nama_lab']; ?></td>
                                <td><?= $as['nama_prodi']; ?></td>
                                <td><?= $as['nama_barang']; ?></td>
                                <td><?= $as['spesifikasi']; ?></td>
                                <td><?= $as['jumlah']; ?></td>
                                <td><?= $as['satuan']; ?></td>
                                <td><?= $as['keterangan']; ?></td>
                                <td><img src="<?php echo base_url() . 'assets/media/' . $as['foto']; ?>" width="150" height="100" /></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url() . 'Pinjambarang/pinjamAset/' . $as['kode_aset']; ?>" role="button">Pinjam</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataAset/' . $as['kode_aset']; ?>" class="text-success"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/deleteDataAset/' . $as['kode_aset']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->