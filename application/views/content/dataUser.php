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
                <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Detail Data User</a>





                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Detail User</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nomor Induk</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Fakultas</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">No. Hp</th>
                                        <th scope="col">User Role</th>
                                        <!-- <th scope="col">Date Created</th> -->
                                        <th scope="col">Foto Profile</th>
                                        <th scope="col">Status Actif</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataUser as $du) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $du['username']; ?></td>
                                            <td><?= $du['nama']; ?></td>
                                            <td><?= $du['nama_prodi']; ?></td>
                                            <td><?= $du['jurusan']; ?></td>
                                            <td><?= $du['fakultas']; ?></td>
                                            <td><?= $du['email']; ?></td>
                                            <td><?= $du['alamat']; ?></td>
                                            <td><?= $du['jabatan']; ?></td>
                                            <td><?= $du['no_hp']; ?></td>
                                            <td><?= $du['role']; ?></td>
                                            <!-- <td><?= date('d F Y', $du['date_created']); ?></td> -->
                                            <td>
                                                <?php $img = $du['foto_profile']; ?>
                                                <?php if ($img == "default.png") { ?>
                                                    <img src="<?php echo base_url() . 'assets/img/' . $img ?>" width="150" height="100" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url() . 'assets/img/profile/' . $img ?>" width="150" height="100" />

                                                <?php } ?>
                                            </td>

                                            <td>
                                                <center><?php
                                                        if ($du['is_active'] == "0") { ?>
                                                        <a href="" class="text-danger"><i class="fas fa-minus-circle"></i></a>
                                                        <!-- $st = "Belum ditanggapi"; -->
                                                    <?php } else { ?>
                                                        <a href="" class="text-success"><i class="fas fa-check-circle"></i></a>
                                                        <!-- $st = "Sudah ditanggapi"; -->
                                                    <?php } ?>
                                                </center>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . 'admin/editDataUser/' . $du['no_induk']; ?>" class="text-success">
                                                    <button class="btn btn-primary">
                                                        <i class=" fas fa-edit"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-danger">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </a>
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
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Detail Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/dataUser'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Inputkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Pilih Nomor Induk:</label>
                                    <select name="no_induk" id="no_induk" class="form-control" required>
                                        <option value="">Nomor Induk</option>
                                        <?php foreach ($masterUser as $pd) : ?>
                                            <option value="<?= $pd['username']; ?>"><?= $pd['username']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="sel1">Pilih Prodi:</label>
                                    <select class="form-control" name="id_prodi" id="id_prodi" required>
                                        <?php
                                        foreach ($hasil as $value) {
                                            echo "<option value='$value->id_prodi'>$value->nama_prodi</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Inputkan Email">
                                </div>

                                <div class="form-group">
                                    <label>Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Inputkan Alamat">
                                </div>

                                <div class="form-group">
                                    <label>Jabatan:</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Inputkan Jabatan">
                                </div>

                                <div class="form-group">
                                    <label>Nomor Hp:</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Inputkan Nomor Hp">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal:</label>
                                    <input type="date" class="form-control" id="date_created" name="date_created" placeholder="">
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
                            <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataUser/' . $du['no_induk']; ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>