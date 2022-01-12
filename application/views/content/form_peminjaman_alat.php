<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Peminjaman Alat Lab FTK</h1>

    </div>



    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card border-bottom-info shadow h-100 py-3">
                    <form class="form-horizontal" action="<?php echo base_url('user/formpilihaset'); ?>" method="get">
                        <div class="form-group">
                            <label class="control-label col-md-3">Prodi</label>
                            <div class="col-md-8">
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="0">-PILIH-</option>
                                    <?php foreach ($prodi->result() as $pd) : ?>
                                        <option value="<?php echo $pd->id_prodi; ?>"><?php echo $pd->nama_prodi; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Ruangan Lab</label>
                            <div class="col-md-8">
                                <select name="subkategori" id="subkategori" class="subkategori form-control" required>
                                    <option value="0">-PILIH-</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-8">

                                <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="float:right">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>