 <!-- Begin Page Content -->
 <div class="container-fluid">
     <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
     <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'AdminBR/newEditDataAsetRusak'; ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                             <input type="hidden" name="kode_aset" class="form-control" value="<?= $asetData->kode_aset ?>">

                         </div>
                         <div class="form-group">
                             <label for="sel1">Pilih Prodi</label>
                             <select class="form-control" name="prodiaset" id="prodiaset" required>
                                 <?php
                                    foreach ($tampilprodi as $value) {
                                        echo "<option value='$value->id_prodi'>$value->nama_prodi</option>";
                                    }
                                    ?>
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="sel1">Pilih Lokasi Lab</label>
                             <select class="form-control" name="labaset" id="labaset" required>
                                 <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Nama Barang</label>
                             <input type="text" name="nama_barang" class="form-control" value="<?= $asetData->nama_barang ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Spesifikasi</label>
                             <textarea id="editor" name="editor"><?= $asetData->spesifikasi ?></textarea>
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
                             <label for="">Foto</label>
                             <input type="file" name="image" class="form-control" value="<?= $asetData->foto ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboranBR/brgRusakRuangan'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 <script>
     CKEDITOR.replace('editor');
 </script>
 <!-- /.container-fluid -->