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
                <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Lokasi Baru</a>



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Lokasi Lab</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Prodi</th>
                                        <th scope="col">Nama Lab</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataLokasi as $dl) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $dl['nama_prodi']; ?></td>
                                            <td><?= $dl['nama_lab']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'admin/editDataLokasi/' . $dl['id_lokasi']; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>
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

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Tambah Data-->
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Lokasi Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/dataLokasi'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <select name="id_prodi" id="id_prodi" class="form-control">
                                        <option value="">Pilih Aset Lokasi</option>
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_lab" name="nama_lab" placeholder="Nama Lab">
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
                            <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataLokasi/' . $dl['id_lokasi']; ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>