<!-- Begin Page Content -->
<div class="container-fluid">



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
            <h6 class="m-0 font-weight-bold text-primary">Data Permohonan Bahan Habis Pakai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No BA</th>
                            <th scope="col">Tanggal Upload BHP</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nama Bahan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Foto</th>
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


                        foreach ($dataBHP as $bhp) :
                            $tgl = $bhp->date_time;
                            $tahun = date('Y');
                            $bulan = substr($tgl, 5, 2);
                            $tanggal = substr($tgl, 8, 2);

                            $nbulan = bulans($bulan);
                        ?>
                            <tr>

                                <td scope="row"><?= $i; ?></td>
                                <td>

                                    <?= $bhp->no_ba ?>
                                </td>
                                <td><?php echo $tanggal; ?> <?php echo $nbulan ?> <?php echo $tahun ?></td>
                                <td><?= $bhp->nama_lab; ?></td>
                                <td><?= $bhp->nama_bahan; ?></td>
                                <td><?= $bhp->jumlah; ?></td>
                                <td><?= $bhp->satuan; ?></td>
                                <td>
                                    <?php $tgp = $bhp->tanggapan; ?>
                                    <?php if ($tgp == "") { ?>
                                        <!-- <a type=button class=badge style=background-color:orange;>Belum Ditanggapi</a> -->
                                        <a href="#" type="button" class="badge badge-primary viewrevkprd" style="background-color:orange; color:white;">Belum Ditanggapi</a>

                                    <?php } else { ?>
                                        <a href="#" type="button" data-toggle="modal" data-target="#tanggapan" class="badge badge-primary viewrevkprd" style="background-color:green; color:white;">Sudah Ditanggapi</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php $img = $bhp->foto; ?>
                                    <?php if ($img == "") { ?>
                                        <p style="color: red;">No Image!</p>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . 'assets/media/' . $img; ?>" width="150" height="100" />
                                    <?php } ?>
                                </td>


                                <td>
                                    <a href="<?php echo base_url() . 'admin/editDataBhp/' . $bhp->id_detail_bhp; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>
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
                <h5 class="modal-title" id="newSubMenuModalLabel">Input Data Permohonan Bahan Habis Pakai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/barangHabisPakai'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <select name="id_master_bhp" id="id_master_bhp" class="form-control">
                            <option value="">Pilih Bahan</option>
                            <?php foreach ($masterbhp as $pd) : ?>
                                <option value="<?= $pd['id_master_bhp']; ?>"><?= $pd['nama_bahan']; ?>-<?= $pd['satuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_lokasi" id="id_lokasi" class="form-control">
                            <option value="">Pilih Lokasi Lab</option>
                            <?php
                            $hasil = $this->db->query("SELECT * FROM tb_lokasi ")->result();
                            foreach ($hasil as $h) {
                            ?>
                                <option value="<?php echo $h->id_lokasi; ?>"><?php echo $h->nama_lab; ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        foreach ($count as $c);
                        foreach ($nba as $n);

                        $no_ba = $c->ca;
                        $format = $n->no_ba;

                        $no_baa = $no_ba + 1;

                        $fix_ba = $no_baa . $format;
                        ?>
                        <input type="text" class="form-control" name="no_ba" value="0<?php echo $fix_ba . date('Y') ?>" readonly>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="date_time" name="date_time" placeholder="Tanggal Upload BHP">
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



<!-- Modal Tanggapan-->
<div class="modal fade" id="tanggapan" tabindex="-1" role="dialog" aria-labelledby="tanggapanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tanggapanLabel">Tanggapan dari Koordinator Lab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="keterangan"><b>Tanggapan :</b></label><br>
                    <?= $bhp->tanggapan; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
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
                <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDetailBhp/' . $bhp->id_detail_bhp; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>