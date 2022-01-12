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
                     <form action="<?php echo base_url() . 'admin/newEditKopSurat'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <input type="hidden" name="id_kopsurat" class="form-control" value="<?= $kopsurat->id_kopsurat ?>">
                         </div>

                         <div class="form-group">
                             <label for="">Keterangan</label>
                             <textarea id="editor" name="editor"><?= $kopsurat->konten_kopsurat ?></textarea>
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $kopsurat->logo ?>">
                             <label for="">Logo Kop Surat</label>
                             <input type="file" name="image" class="form-control" value="<?= $kopsurat->logo ?>">
                         </div>
                         <div class="form-group">
                             <label for="jenis_kelamin">Aktifasi Kop Surat</label><br>
                             <label><input type="radio" name="status" value="0" <?php echo ($kopsurat->status == 0 ? ' checked' : ''); ?>> Disable</label>
                             <label><input type="radio" name="status" value="1" <?php echo ($kopsurat->status == 1 ? ' checked' : ''); ?>> No disable</label>
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
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