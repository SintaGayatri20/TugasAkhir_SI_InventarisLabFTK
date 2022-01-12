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
                                <th>Status</th>
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
                                    <td>
                                        <?php $sts = $as->tanggapan; ?>
                                        <?php if ($sts == '') { ?>
                                            <a class="badge badge-primary" style="background-color:red; color:white;">Belum ditanggapi</a>
                                        <?php } else { ?>
                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#newSubMenuModal" style="background-color:green; color:white;">Sudah ditanggapi</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center><a href="<?php echo base_url('koorlab/tanggapan/id/' . $as->id_detail_bhp . '/' . $as->id_lokasi) ?>" class="text-warning"><i class="fas fa-reply"></i></a></center>
                                    </td>
                                    <!-- <td>
                                            <input type="checkbox" id="id_bhp" name="id_bhp[]" value="" required />
                                        </td> -->
                                    <td>
                                        <center><a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></a></center>
                                    </td>
                            </tr>

                        <?php
                                    $no++;
                                }
                        ?>

                        </tbody>

                    </table>



                    <br>

                    <div class="form-group">
                        <div class="col-md-3">
                            <a href="<?php echo base_url('koorlab/cetakbhps/id/' . $as->id_lokasi) ?>" target="_blank" class="btn btn-info" style="margin-left;"><i class="fas fa-print"></i> Cetak Surat BHP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tanggapan-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Pesan Tanggapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="keterangan"><b>Tanggapan :</b></label>
                    <?= $as->tanggapan; ?>
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
                <a class="btn btn-danger" href="<?php echo base_url() . 'koorlab/deleteBHP/' . $as->id_detail_bhp; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

</div>
<br>