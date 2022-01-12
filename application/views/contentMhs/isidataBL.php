<!-- Begin Page Content -->
<div class="container-fluid">

    <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>

    <!-- Page Heading -->
    <div class="row ml-5">
        <h1 class="h3 mb-4 text-gray-800"><b><?= $title; ?></b></h1>
        <div class="card col-lg-11">
            <div class="card-header">
                <b>Isi Data Surat Bebas Lab</b>
            </div>
            <?php if ($error = $this->session->flashdata('msg')) { ?>
                <div class="alert alert-success" id="msg">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo $error; ?>
                </div>

            <?php } ?>
            <div class="card-body">
                <section class="content">
                    <form action="<?php echo base_url() . 'user/insertSuratBebasLabTest'; ?>" method="post">

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="hidden" name="id_bebas_lab" id="id_bebas_lab" class="form-control" value="" readonly>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" value="<?= $user['no_induk'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Pilih Prodi/Jurusan</label>
                            <select name="id_prodi" id="id_prodi" class="form-control" required>
                                <option value="">Pilih Prodi/Jurusan</option>
                                <?php foreach ($prodi as $pd) : ?>
                                    <option value="<?= $pd['id_prodi']; ?>"><?= $pd['nama_prodi']; ?>-<?= $pd['jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Konsentrasi</label>
                            <input type="text" name="konsentrasi" id="konsentrasi" class="form-control" value="" required>

                            <?php if (validation_errors()) : ?>
                                <small class="text-danger"><?= validation_errors(); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Judul Skripsi</label>
                            <textarea id="editor" name="editor"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Permohonan Surat Bebas Lab</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit" />

                        <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                        <br>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <br><br><br>
    <!-- DataTales Example -->
    <div class="card shadow ml-5 mr-5 ">
        <div class="card-header col-lg-11">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Permohonan Surat Bebas Lab Mahasiswa</h6>
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
</div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Surat Keterangan Bebas Lab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <a href="#"></a><input type="file" class="form-control" id="upload_surat" name="upload_surat" placeholder=""></a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-success">TAMBAH</button>
            </div>
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
                <a class="btn btn-danger" href="<?php echo base_url() . 'user/deleteData/' . $as['id_bebas_lab']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    CKEDITOR.replace('editor');
</script>