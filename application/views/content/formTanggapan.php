 <!-- Begin Page Content -->
 <div class="container-fluid">
     <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
     <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg-12">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'admin/tanggapan'; ?>" method="post">
                         <div class="form-group">
                             <input type="hidden" name="id_laporan" class="form-control" value="<?= $dataLaporan->id_laporan ?>">
                             <textarea id="editor" name="editor"><?= $dataLaporan->tanggapan ?></textarea>
                         </div>
                         <input type="submit" class="btn btn-primary" value="Tambah" />

                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                     </form>
                 </section>
             </div>
         </div>
     </div>
 </div>

 <br><br><br><br><br><br><br><br><br><br><br><br>
 <!-- /.container-fluid -->
 <script>
     CKEDITOR.replace('editor');
 </script>