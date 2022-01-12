            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                <div class="row">
                    <div class="col-lg-8">
                        <?= form_open_multipart('kaprodi/editProfile'); ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">NAMA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" value="<?= $user['nama'] ?>" name="nama">
                                <small class="text-danger"><?= form_error('nama'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">NIM/NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_induk" value="<?= $user['no_induk'] ?>" name="no_induk" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">JABATAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jabatan" value="<?= $user['jabatan'] ?>" name="jabatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" value="<?= $user['email'] ?>" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No.Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_hp" value="<?= $user['no_hp'] ?>" name="no_hp">
                                <small class="text-danger"><?= form_error('no_hp'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" value="<?= $user['alamat'] ?>" name="alamat">
                                <small class="text-danger"><?= form_error('alamat'); ?></small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2"><b> Foto</b></div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . $user['foto_profile'] ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto_profile" name="foto_profile">
                                            <label for="" class="custom-file-label">Pilih foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button class="btn btn-primary">Edit</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->