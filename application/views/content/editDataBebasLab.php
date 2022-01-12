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
                     <form action="<?php echo base_url() . 'admin/neweditbebaslab'; ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                             <input type="hidden" name="id_bebas_lab" class="form-control" value="<?= $dataBl->id_bebas_lab ?>">
                             <label for="">Pilih Prodi</label>
                             <select name="id_prodi" id="id_prodi" class="form-control" required>
                                 <option value="">--Pilih Prodi--</option>
                                 <?php

                                    $hasil = $this->db->query("SELECT * FROM tb_prodi ")->result();
                                    foreach ($hasil as $h) {
                                    ?>
                                     <option value="<?php echo $h->id_prodi; ?>"><?php echo $h->nama_prodi; ?></option>

                                 <?php
                                    }
                                    ?>

                             </select>
                         </div>
                         <div class="form-group">

                             <label for="">Nama Lengkap</label>
                             <input type="text" class="form-control" name="nama" value="<?php echo $dataBl->nama ?>">
                         </div>
                         <div class="form-group">

                             <label for="">NIM</label>
                             <input type="text" class="form-control" name="nim" value="<?php echo $dataBl->nim ?>">
                         </div>
                         <div class="form-group">

                             <label for="">Konsentrasi</label>
                             <input type="text" class="form-control" name="konsentrasi" value="<?php echo $dataBl->konsentrasi ?>">
                         </div>
                         <div class="form-group">

                             <label for="">Judul Skripsi</label>
                             <textarea id="editor" name="editor"><?php echo $dataBl->judul_skripsi ?></textarea>
                         </div>

                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('admin/cetakSuratBebasLab'); ?>">Back</a>
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