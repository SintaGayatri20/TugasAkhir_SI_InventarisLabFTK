<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pilih Aset</h1>

    </div>



    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card border-bottom-info shadow h-100 py-3">
                    <form class="form-horizontal" action="<?php echo base_url('user/savepinjam'); ?>" method="post">
                        <br>
                        <input type="hidden" name="id_lokasi" value="<?php echo $this->input->post('subkategori'); ?>" />
                        <table id="example" class="display" style="width:96%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi</th>
                                    <th>Nama Barang</th>
                                    <th>Spesifikasi</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Pinjam</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($aset as $as) {

                                    $jumlah = $as->jumlah;
                                ?>
                                    <tr>

                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $as->nama_lab; ?></td>
                                        <td><?php echo $as->nama_barang; ?></td>
                                        <td><?php echo $as->spesifikasi; ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $as->satuan; ?></td>
                                        <td>
                                            <div class="n"><input type="radio" id="kode_aset" name="kode_aset" value="<?= $as->kode_aset; ?>" required /></div>
                                        </td>
                                    </tr>

                                <?php
                                    $no++;
                                }
                                ?>

                            </tbody>
                            <?php
                            foreach ($count as $c);
                            foreach ($nba as $n);

                            $no_ba = $c->ca;
                            $format = $n->no_ba;

                            $no_baa = $no_ba + 1;

                            $fix_ba = $no_baa . $format;
                            ?>

                        </table>
                        <br>

                        <div class="form-group">
                            <label class="control-label col-md-3">No BA</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="no_ba" value="0<?php echo $fix_ba . date('Y') ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah</label>

                            <div class="col-md-8">
                                <input type="number" max="100" step="1" min="1" value="1" class="form-control" name="jumlah">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Approval</label>

                            <div class="col-md-8">
                                <select name="approval" id="approval" class="form-control" required>

                                    <option value="">-Approval-</option>
                                    <?php foreach ($approval as $ap) { ?>
                                        <option value="<?php echo $ap->no_induk; ?>"><?php echo $ap->nama; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Keperluan</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="keperluan" rows="3" placeholder="Keperluan"></textarea>
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

    <br>