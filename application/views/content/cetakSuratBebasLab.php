<!-- Begin Page Content -->
<div class="container-fluid">
    <script src="<?php echo base_url('assets/ck_assets/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('assets/ck_assets/sample/js/sample.js'); ?>"></script>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?php if ($error = $this->session->flashdata('msg')) { ?>
        <div class="alert alert-success" id="msg">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $error; ?>
        </div>

    <?php } ?>

    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Permohonan Surat Bebas Lab</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Konsentrasi</th>
                            <th scope="col">Judul Skripsi</th>
                            <th scope="col">Cetak Surat</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataBl as $as) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $as['nama']; ?></td>
                                <td><?= $as['nim']; ?></td>
                                <td><?= $as['nama_prodi']; ?></td>
                                <td><?= $as['jurusan']; ?></td>
                                <td><?= $as['konsentrasi'] ?></td>
                                <td><?= $as['judul_skripsi']; ?></td>
                                <td align="center"><a class="btn btn-info" aria-hidden="true" href="<?php echo base_url('admin/cetakSurketBebasLab/' . $as['id_bebas_lab']) ?>kmb" target="_blank"><span class="fa fa-print"></a></td>


                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataBebaslab/' . $as['id_bebas_lab']; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>
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

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Input Data Permohonan Bahan Habis Pakai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/cetakSuratBebasLab'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="form-group">
                            <select name="id_prodi" id="id_prodi" class="form-control" required>
                                <option value="">--Pilih Prodi--</option>
                                <?php
                                $hasil = $this->db->query("SELECT * FROM tb_prodi ")->result();
                                foreach ($hasil as $h) {
                                ?>
                                    <option value="<?php echo $h->id_prodi; ?>"><?php echo $h->nama_prodi; ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="konsentrasi" name="konsentrasi" placeholder="Konsentrasi">
                        </div>
                        <div class="form-group">
                            <label for="sel1"><b>Judul Skripsi</b></label>
                            <textarea id="editor" name="editor" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Judul Skripsi">
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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteBebasLab/' . $as['id_bebas_lab']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->


<script>
    initSample();
</script>

<!-- End of Main Content -->