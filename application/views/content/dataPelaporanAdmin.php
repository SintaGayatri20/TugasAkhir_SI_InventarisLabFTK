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
                            <th scope="col">Nama Pelapor</th>
                            <th scope="col">Tanggal Lapor</th>
                            <th scope="col">Nama Aset</th>
                            <!-- <th scope="col">Lokasi</th>
                            <th scope="col">Prodi</th> -->
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggapan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Beri Tanggapam</th>
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
                                <td><?= $dp['nama']; ?></td>
                                <td><?php echo $tanggal; ?> <?php echo $nbulan ?> <?php echo $tahun ?></td>
                                <td><?= $dp['nama_barang']; ?></td>
                                <td><?= $dp['deskripsi_laporan']; ?></td>
                                <td><?= $dp['tanggapan']; ?></td>
                                <td>
                                    <center><?php
                                            if ($dp['tanggapan'] == "") { ?>
                                            <a href="" class="text-danger"><i class="fas fa-minus-circle"></i></i></a>
                                            <!-- $st = "Belum ditanggapi"; -->
                                        <?php } else { ?>
                                            <a href="" class="text-success"><i class="fas fa-check-circle"></i></i></a>
                                            <!-- $st = "Sudah ditanggapi"; -->
                                        <?php } ?>
                                    </center>
                                </td>
                                <td>
                                    <center><a href="<?php echo base_url() . 'admin/formTanggapan/' . $dp['id_laporan']; ?>" class="btn btn-warning mb-3"><i class="fas fa-reply"></i></a></center>
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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'admin/deleteDataPelaporan/' . $dp['id_laporan']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!-- End of Main Content -->

<!-- Modal Tambah Data-->