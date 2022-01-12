<div class="container-fluid">
    <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>

    <div class="container-fluid">

        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Aset Baru</a>

        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card border-bottom-info shadow h-100 py-3">
                    <form class="form-horizontal" action="<?php echo base_url('AdminBR/cetakPdf'); ?>" method="post">
                        <br>
                        <input type="hidden" name="id_lokasi" value="<?php echo $_GET['subkategori']; ?>" />
                        <table id="example" class="display" style="width:96%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi</th>
                                    <th>Nama Barang</th>
                                    <th>Spesifikasi</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($aset as $as) {

                                    $jumlah = $as->jumlah;
                                ?>
                                    <tr>

                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $as->nama_lab; ?></td>
                                        <td><?php echo $as->nama_barang; ?></td>
                                        <td><?php echo $as->spesifikasi; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $as->satuan; ?></td>
                                        <td><?php echo $as->keterangan; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'AdminBR/editDataAsetRuangan/' . $as->kode_aset; ?>" class="text-success"><i class=" fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                    $no++;
                                }
                                ?>

                            </tbody>


                        </table>



                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-8">
                                <input type="submit" value="Cetak PDF" name="submit" class="btn btn-danger" style="float:right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <form action="<?= base_url('AdminBR/tambahDataAsetRuangan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">



                    <div class="form-group">
                        <?php
                        $getlks = $_GET['subkategori'];

                        ?>
                        <input type="hidden" class="form-control" id="id_lokasi" name="id_lokasi" value="<?php echo $getlks ?>">

                    </div>
                    <div class="form-group">
                        <?php
                        $getlks = $_GET['kategori'];

                        ?>
                        <input type="hidden" class="form-control" id="id_prodi" name="id_prodi" value="<?php echo $getlks ?>">

                    </div>
                    <div class="form-group">
                        <label for="sel1"><b>Nama Barang</b></label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1"><b>Jumalah Barang</b></label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumalah Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1"><b>Satuan</b></label>
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1"><b>Spesifikasi</b></label>
                        <textarea id="editor" name="editor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan"><b>Keterangan (Baik/Rusak Ringan/Rusak Berat)</b></label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Inputkan keterangan">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" name="image" placeholder="Foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                    <input type="submit" value="TAMBAH" name="submit" class="btn btn-primary" style="float:right">
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
                <a class="btn btn-danger" href="<?php echo base_url() . 'AdminBR/deleteDataAsetRuangan/' . $as->kode_aset; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('editor');
</script>
<br>