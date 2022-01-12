 <!-- Begin Page Content -->
 <div class="container-fluid">
     <script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
     <script src="<?php echo base_url('asset/ckeditor/sample/js/sample.js'); ?>"></script>

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <?php if ($error = $this->session->flashdata('msg')) { ?>
         <div class="alert alert-success" id="msg">
             <a href="#" class="close" data-dismiss="alert">&times;</a>
             <strong>Success!</strong> <?php echo $error; ?>
         </div>

     <?php }
        $idnya = $this->uri->segment(4);
        $idlokasi = $this->uri->segment(5);

        ?>
     <div class="row">
         <div class="col-lg-12">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'koorlab/saveTanggapan'; ?>" method="post">
                         <div class="form-group">
                             <input type="hidden" name="id_detail_bhp" id="id_detail_bhp" class="form-control" value="<?= $idnya ?>">
                             <input type="hidden" name="id_lokasi" id="id_lokasi" class="form-control" value="<?= $idlokasi ?>">
                             <textarea id="editor" name="editor"></textarea>
                         </div>
             </div>
             <input type="submit" class="btn btn-primary" value="Submit" />

             <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
             </form>
             </section>
         </div>
     </div>
 </div>
 </div>


 <br><br><br><br><br><br><br><br><br><br><br><br>
 <script>
     CKEDITOR.replace('editor');
 </script>
 <!-- /.container-fluid -->