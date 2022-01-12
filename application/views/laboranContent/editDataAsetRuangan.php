 <!-- Begin Page Content -->
 <div class="container-fluid">

     <script src="<?php echo base_url('assets/ck_assets/ckeditor.js'); ?>"></script>
     <script src="<?php echo base_url('assets/ck_assets/sample/js/sample.js'); ?>"></script>
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'laboran/newEditDataAsetRuangan'; ?>" method="post" enctype="multipart/form-data">


                         <div class="form-group">
                             <input type="hidden" name="kode_aset" class="form-control" value="<?= $asetData->kode_aset ?>">
                             <input type="hidden" name="id_lokasi" class="form-control" value="<?= $asetData->id_lokasi ?>">
                             <input type="hidden" name="id_prodi" class="form-control" value="<?= $asetData->id_prodi ?>">
                             <label for="">Nama Barang</label>
                             <input type="text" name="nama_barang" class="form-control" value="<?= $asetData->nama_barang ?>">
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
                             <label for="">Spesifikasi</label>
                             <textarea id="editor" name="editor"><?= $asetData->spesifikasi ?></textarea>
                         </div>
                         <div class="form-group">
                             <label for="keterangan">Keterangan (Baik/Rusak Ringan/Rusak Berat)</label><br>
                             <input type="text" name="keterangan" class="form-control" value="<?php echo $asetData->keterangan ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $asetData->foto ?>">
                             <label for="">Foto</label>
                             <input type="file" name="image" class="form-control" value="<?= $asetData->foto ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboran/formdataaset'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 <script>
     initSample();
 </script>
 <!-- /.container-fluid -->