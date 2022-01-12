<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Permohonan Surat Bebas Lab</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Konsentrasi</th>
                            <th scope="col">Judul Skripsi</th>
                            <th scope="col">Cetak Surat</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataBl as $as) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $as['nama']; ?></td>
                                <td><?= $as['nim']; ?></td>
                                <td><?= $as['nama_prodi']; ?></td>
                                <td><?= $as['jurusan']; ?></td>
                                <td><?= $as['konsentrasi'] ?></td>
                                <td><?= $as['judul_skripsi']; ?></td>
                                <td align="center"><a class="btn btn-info" aria-hidden="true" href="<?php echo base_url('Laboran/cetakSurketBebasLab/' . $as['id_bebas_lab']) ?>kmb" target="_blank"><span class="fa fa-print"></a></td>


                                <td>
                                    <a href="<?php echo base_url() . 'laboran/editDataBebaslab/' . $as['id_bebas_lab']; ?>" class="text-success"><button class="btn btn-success"><i class=" fas fa-edit"></i></button></a>
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
                    <a class="btn btn-danger" href="<?php echo base_url() . 'laboran/deleteBebasLab/' . $as['id_bebas_lab']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->