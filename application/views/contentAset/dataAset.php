<!-- Begin Page Content -->
<div class="container-fluid">
    <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Aset Baru</a>
    <a href="<?= base_url('ExportExcelAset/excel_aset') ?>" class="btn btn-success mb-3">Export Data Excel</a>
    <!-- <a href="<?= base_url('ExportPdfAset/pdf_aset') ?>" class="btn btn-danger mb-3">Export Data PDF</a> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Aset</h6>
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
                                <td>
                                    <center>
                                        <?php
                                        $img = $as['foto'];
                                        ?>
                                        <?php if ($img == "") { ?>
                                            <p class="text-danger">No Image!</p>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() . 'assets/media/' . $img; ?>" width="150" height="100" />
                                        <?php } ?>
                                    </center>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataAset/' . $as['kode_aset']; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>
                                </td>
                                <td>
                                    <a href="#" class="text-danger"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></button></a>
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

    <!-- End of Main Content -->

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Aset Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/dataAset'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="sel1">Pilih Prodi</label>
                            <select class="form-control" name="prodiaset" id="prodiaset">
                                <?php
                                foreach ($tampilprodi as $value) {
                                    echo "<option value='$value->id_prodi'>$value->nama_prodi</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Pilih Lokasi Lab</label>
                            <select class="form-control" name="labaset" id="labaset">
                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="sel1"><b>Nama Barang</b></label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="sel1"><b>Spesifikasi</b></label>
                            <textarea id="editor" name="editor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sel1"><b>Jumlah</b></label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <label for="sel1"><b>Satuan</b></label>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        </div>
                        <div class="form-group">
                            <label for="sel1"><b>Keterangan</b></label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Inputkan keterangan">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" id="image" name="image" placeholder="Foto">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                        <button type="submit" class="btn btn-success">TAMBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataAset/' . $as['kode_aset']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('editor');
</script>