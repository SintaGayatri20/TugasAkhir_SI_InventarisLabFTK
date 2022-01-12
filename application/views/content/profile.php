            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>

                <!-- Page Heading -->
                <!-- <h1 class="h3 mb-4 text-gray-800"></h1> -->
                <div class="card">
                    <div class="card-header">
                        <b><?= $title; ?></b>
                    </div><br>
                    <center>
                        <img src="<?= base_url('assets/img/profile/') . $user['foto_profile'] ?>" width="200px" alt="" style="display: block; border-radius: 50%; border-color:brown;" border="2px">
                    </center><br>
                    <div class="form-group">
                        <label class="control-label col-md-3">NAMA</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="no_ba" value="<?= $user['nama'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">NIM/NIP</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="no_ba" value="<?= $user['no_induk'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">JABATAN</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="jabatan" value="<?= $user['jabatan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">EMAIL</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">NO. Hp</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="no_ba" value="<?= $user['no_hp'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">ALAMAT</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="no_ba" value="<?= $user['alamat'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8"><a href="<?= base_url('admin/editProfile') ?>" class="btn btn-primary">Edit Profile</a></div>
                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->