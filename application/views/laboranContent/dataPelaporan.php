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
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Pelaporan</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelaporan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Pelapor</th>
                            <th scope="col">Tanggal Lapor</th>
                            <th scope="col">Nama Aset</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Lokasi</th>
                            <!-- <th scope="col">Lokasi</th>
                            <th scope="col">Prodi</th> -->
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggapan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
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
                        foreach ($dataPelaporan as $dp) :
                            $tgl = $dp['tgl_lapor'];
                            $tahun = date('Y');
                            $bulan = substr($tgl, 5, 2);
                            $tanggal = substr($tgl, 8, 2);

                            $nbulan = bulans($bulan);

                        ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $dp['no_induk']; ?></td>
                                <td><?= $dp['nama']; ?></td>
                                <td><?php echo $tanggal; ?> <?php echo $nbulan ?> <?php echo $tahun ?></td>
                                <td><?= $dp['nama_barang']; ?></td>
                                <td><?= $dp['nama_prodi']; ?></td>
                                <td><?= $dp['nama_lab']; ?></td>
                                <td><?= $dp['deskripsi_laporan']; ?></td>
                                <td><?= $dp['tanggapan']; ?></td>
                                <td>
                                    <?php $tgp = $dp['tanggapan']; ?>
                                    <?php if ($tgp == "") { ?>
                                        <!-- <a type=button class=badge style=background-color:orange;>Belum Ditanggapi</a> -->
                                        <a href="#" type="button" class="badge badge-primary viewrevkprd" style="background-color:orange; color:white;">Belum Ditanggapi</a>

                                    <?php } else { ?>
                                        <a href="#" type="button" class="badge badge-primary viewrevkprd" style="background-color:green; color:white;">Sudah Ditanggapi</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'laboran/editDataPelaporan/' . $dp['id_laporan']; ?>" class="btn btn-success mb-3"><i class="fas fa-edit"></i></a>
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


    <!-- /.container-fluid -->

    <!-- End of Main Content -->

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
                <form action="<?= base_url('laboran/data_pelaporan'); ?>" method="post">
                    <div class="modal-body">




                        <div class="form-group">
                            <label for="sel1">Lokasi:</label>
                            <select class="form-control" name="lokasi" id="lokasi">
                                <option value="">-Pilih Nama Lab-</option>
                                <?php
                                foreach ($hasil as $value) {
                                    echo "<option value='$value->id_lokasi'>$value->nama_lab</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Pilih Aset:</label>
                            <select class="form-control" name="aset" id="aset">
                                <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="">Inputkan Keterangan</label>
                            <textarea id="editor" name="editor"></textarea>

                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Jumlah">
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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'laboran/deletePelaporan/' . $dp['id_laporan']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    initSample();
</script>