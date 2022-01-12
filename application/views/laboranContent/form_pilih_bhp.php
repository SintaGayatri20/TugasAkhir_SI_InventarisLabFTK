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
                                    <th>Lokasi</th>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Spesifikasi Barang</th>
                                    <th>Bahan Habis Pakai</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($databhp as $as) {
                                    ?>

                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $as->no_ba ?></td>
                                        <td><?php echo $as->nama_lab; ?></td>
                                        <td><?php echo $as->nama_bahan; ?></td>
                                        <td><?php echo $as->jumlah; ?></td>
                                        <td><?php echo $as->satuan; ?></td>
                                        <td><img src="<?php echo base_url() . 'assets/media/' . $as->foto; ?>" width="150" height="100" /></td>
                                        <td>
                                            <input type="checkbox" id="id_bhp" name="id_bhp[]" value="<?= $as->id_bhp; ?>" />
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

    <br>