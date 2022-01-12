<div class="container-fluid">

    <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>
    <!-- Page Heading -->

    <h1 class="h3 mb-0 text-gray-800">Form Permohonan Perbaikan Barang Rusak Ruangan</h1>
    <br>

    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Aset Baru</a>
    <?php if ($error = $this->session->flashdata('msg')) { ?>
        <div class="alert alert-success" id="msg">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $error; ?>
        </div>

    <?php } ?>
    <?php if ($error = $this->session->flashdata('msg_hapus')) { ?>
        <div class="alert alert-danger" id="msg_hapus">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $error; ?>
        </div>

    <?php } ?>


    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card border-bottom-info shadow h-100 py-3">
                    <form class="form-horizontal" action="<?php echo base_url('AdminBR/savebrgRusak'); ?>" method="post">
                        <br>
                        <table id="example" class="display" style="width:96%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi</th>
                                    <th>Prodi</th>
                                    <th>Nama Barang</th>
                                    <th>Spesifikasi</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <!-- <th>Pilih Aset</th> -->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataAset as $as) : ?>
                                    <tr>

                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $as->nama_lab; ?></td>
                                        <td><?= $as->nama_prodi; ?></td>
                                        <td><?= $as->nama_barang; ?></td>
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
                                        <!-- <td>
                                            <center>
                                                <input type="checkbox" id="kode_aset" name="kode_aset[]" value="<?= $as->kode_aset; ?>" />
                                            </center>
                                        </td> -->
                                        <td>
                                            <a href="<?php echo base_url() . 'AdminBR/editDataAsetRusak/' . $as->kode_aset; ?>" class="text-success"><i class=" fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>

                        </table>



                        <br>

                        <!-- <div class="form-group">
                            <div class="col-md-3 ml-3">
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="float:left">
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- End of Main Content -->

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Barang Rusak Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('AdminBR/brgRusakRuangan'); ?>" method="post" enctype="multipart/form-data">
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
                            <label for="sel1">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Spesifikasi</label>
                            <textarea id="editor" name="editor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Keterangan</label><br>
                            <!-- <label><input type="radio" name="keterangan" value="Rusak Ringan"> Rusak Ringan</label> -->
                            <label><input type="radio" name="keterangan" value="Rusak Berat"> Rusak Berat</label>
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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'AdminBR/deleteDataAsetRusak/' . $as->kode_aset; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor');
    </script>
</div>
</div>