 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'pinjambarang/newPinjam'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <label for="">Nama Peminjam</label>
                             <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="kode_aset" class="form-control" value="<?= $asetData->kode_aset ?>">
                             <label for="">Lokasi</label>
                             <select name="id_lokasi" id="form-control" class="form-control">
                                 <?php foreach ($dataLokasi as $dl) :
                                        $idDA = $asetData->id_lokasi;
                                        $idDL = $dl->id_prodi;
                                        if ($idDA == $idDL) {
                                    ?>
                                     <?php } ?>
                                     <option value=<?php echo $dl->id_lokasi ?>><?php echo $dl->nama_lab ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Prodi</label>
                             <select name="id_prodi" id="form-control" class="form-control">
                                 <?php foreach ($dataProdi as $dp) :
                                        $idDA = $asetData->id_prodi;
                                        $idDP = $dp->id_prodi;
                                        if ($idDA == $idDP) {
                                    ?>
                                     <?php } ?>
                                     <option value=<?php echo $dp->id_prodi ?>><?php echo $dp->nama_prodi ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="">Nama Barang</label>
                             <input type="text" name="nama_barang" class="form-control" value="<?= $asetData->nama_barang ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Spesifikasi</label>
                             <input type="text" name="spesifikasi" class="form-control" value="<?= $asetData->spesifikasi ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Jumlah</label>
                             <input type="text" name="jumlah" class="form-control" value="<?= $asetData->jumlah ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Satuan</label>
                             <input type="text" name="satuan" class="form-control" value="<?= $asetData->satuan ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Keterangan</label>
                             <input type="text" name="keterangan" class="form-control" value="<?= $asetData->keterangan ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $asetData->foto ?>">
                             <label for="">Foto</label><br>
                             <img src="<?php echo base_url() . 'assets/media/' . $asetData->foto; ?>" width="150" height="100" />
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="id_user" class="form-control" value="<?= $user['id']; ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Pinjam" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('pinjambarang'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->