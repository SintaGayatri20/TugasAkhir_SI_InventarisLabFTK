            Begin Page Content
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
                        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                                        <th scope="col">Active</th>
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
                                            <td><?= $du['password']; ?></td>
                                            <td><?= $du['is_active']; ?></td>

                                            <td>
                                                <a href="" class="text-success">
                                                    <button class="btn btn-success">
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
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data User Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/dataUser'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                </div>
                                <div class="form-group">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">Status</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="date_created" name="date_created" placeholder="Date Created">
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
                            <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataUser/' . $du['id']; ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>





            <div class="container-fluid">

                <!-- Page Heading -->

                <h1 class="h3 mb-0 text-gray-800">Form Pilih Bahan Habis Pakai</h1>

                <?php if ($error = $this->session->flashdata('msg')) { ?>
                    <div class="alert alert-success" id="msg">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> <?php echo $error; ?>
                    </div>

                <?php } ?>


                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="card border-bottom-info shadow h-100 py-3">
                                <form class="form-horizontal" action="<?php echo base_url('laboran/saveBhp'); ?>" method="post">
                                    <br>
                                    <input type="hidden" name="id_lokasi" value="<?php echo $this->input->post('subkategori'); ?>" />
                                    <table id="example" class="display" style="width:96%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No BA</th>
                                                <th>Tanggal Lapor</th>
                                                <th>NIP</th>
                                                <th>Nama Pelapor</th>
                                                <th>Nama Prodi</th>
                                                <th>Nama Lab</th>
                                                <th>Nama Bahan</th>
                                                <th>Jumlah Barang</th>
                                                <th>Satuan</th>
                                                <th>Spesifikasi Barang</th>
                                                <th>Tanggapi</th>
                                                <th>Delete</th>
                                                <!-- <th>Tandai BHP</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                function bulans($bulan)
                                                {
                                                    switch ($bulan) {
                                                        case "01":
                                                            $bulan = "Januari";
                                                            break;
                                                        case "02":
                                                            $bulan = "Februari";
                                                            break;
                                                        case "03":
                                                            $bulan = "Maret";
                                                            break;
                                                        case "04":
                                                            $bulan = "April";
                                                            break;
                                                        case "05":
                                                            $bulan = "Mei";
                                                            break;
                                                        case "06":
                                                            $bulan = "Juni";
                                                            break;
                                                        case "07":
                                                            $bulan = "Juli";
                                                            break;
                                                        case "08":
                                                            $bulan = "Agustus";
                                                            break;
                                                        case "09":
                                                            $bulan = "September";
                                                            break;
                                                        case "10":
                                                            $bulan = "Oktober";
                                                            break;
                                                        case "11":
                                                            $bulan = "November";
                                                            break;
                                                        case "12":
                                                            $bulan = "Desember";
                                                            break;
                                                    }
                                                    return $bulan;
                                                }

                                                foreach ($databhp as $as) {
                                                    $tgl = $as->date_time;
                                                    $tahun = date('Y');
                                                    $bulan = substr($tgl, 5, 2);
                                                    $tanggal = substr($tgl, 8, 2);

                                                    $nbulan = bulans($bulan);
                                                ?>

                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $as->no_ba ?></td>
                                                    <td><?php echo $tanggal; ?> <?php echo $nbulan ?> <?php echo $tahun ?></td>
                                                    <td><?php echo $as->no_induk ?></td>
                                                    <td><?php echo $as->nama ?></td>
                                                    <td><?php echo $as->nama_prodi; ?></td>
                                                    <td><?php echo $as->nama_lab; ?></td>
                                                    <td><?php echo $as->nama_bahan; ?></td>
                                                    <td><?php echo $as->jumlah; ?></td>
                                                    <td><?php echo $as->satuan; ?></td>
                                                    <td><img src="<?php echo base_url() . 'assets/media/' . $as->foto; ?>" width="150" height="100" /></td>
                                                    <td><a href="<?php echo base_url('koorlab/tanggapan/id/' . $as->id_detail_bhp) ?>" class="btn btn-warning"><i class="fas fa-reply"></i></a></td>

                                                    <td>
                                                        <a href="#" class="text-danger"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></button></a>
                                                    </td>
                                            </tr>

                                        <?php
                                                    $no++;
                                                }
                                        ?>

                                        </tbody>

                                    </table>



                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-1">
                                                <a href="<?php echo base_url('koorlab/cetakbhps/id/' . $as->id_lokasi) ?>" target="_blank" class="btn btn-info" style="margin-left:750px;"><i class="fas fa-print"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <br>