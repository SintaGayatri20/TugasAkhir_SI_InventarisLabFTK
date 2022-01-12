<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('AsetProdi/excel_asetilkom') ?>" class="btn btn-success mb-3">Export Data Excel</a>
    <a href="<?= base_url('AsetProdi/pdf_asetilkom') ?>" class="btn btn-danger mb-3">Export Data PDF</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Aset Prodi Ilmu Komputer</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataAset as $as) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $as->nama_lab; ?></td>
                                <td><?= $as->nama_barang; ?></td>
                                <td><?= $as->nama_prodi; ?></td>
                                <td><?= $as->spesifikasi; ?></td>
                                <td><?= $as->jumlah; ?></td>
                                <td><?= $as->satuan; ?></td>
                                <td><?= $as->keterangan; ?></td>
                                <td>
                                    <center>
                                        <?php $img = $as->foto; ?>
                                        <?php if ($img == "") { ?>
                                            <p class="text-danger">No Image!</p>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() . 'assets/media/' . $img; ?>" width="150" height="100" />
                                        <?php } ?>
                                    </center>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'AdminBR/editDataAset/' . $as->kode_aset; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>

                                </td>
                                <td>
                                    <a href="#" class="text-danger"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></button></a>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="text-danger" href="<?= base_url('admin/aset'); ?>">
                    <i class=" fas fa-sign-in-alt"></i> Back
                </a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin ingin menghapus data ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Hapus" di bawah jika anda yakin ingin menghapus data ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataAset/' . $as->kode_aset; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>