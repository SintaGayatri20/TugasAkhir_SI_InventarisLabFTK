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
    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data User Baru</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User Login</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">User Role</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status Aktif</th>
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
                                <td><?= $du['role']; ?></td>
                                <td>
                                    <p class="text-danger">Private access!</p>
                                </td>
                                <td>
                                    <center><?php
                                            if ($du['is_active'] == "0") { ?>
                                            <a href="" class="text-danger"><i class="fas fa-minus-circle"></i></a>
                                            <!-- $st = "Belum ditanggapi"; -->
                                        <?php } else { ?>
                                            <p style="font-family: Arial, Helvetica, sans-serif;"><b>AKTIF</b></p>
                                            <!-- $st = "Sudah ditanggapi"; -->
                                        <?php } ?>
                                    </center>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataUserLogin/' . $du['id_user']; ?>" class="text-success">
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


<!-- End of Main Content -->

<!-- Modal Tambah Data-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data User Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/dataUserLogin'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active">
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
                <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataUserLogin/' . $du['id_user']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
</div>