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
                     <form action="<?php echo base_url() . 'kaprodi/newEditDataPelaporan'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <input type="hidden" name="id_laporan" class="form-control" value="<?= $pelaporan->id_laporan ?>">
                             <label for="">Nama Laboran</label>
                             <input type="text" name="spesifikasi" class="form-control" value="<?= $this->session->userdata('nama'); ?>" readonly>
                         </div>
                         <div class="form-group">
                             <label for="">Nomor Induk</label>
                             <input type="text" name="id_user" class="form-control" value="<?= $pelaporan->id_user ?>" readonly>
                         </div>
                         <div class="form-group">

                             <label for="sel1">Pilih Lokasi</label>
                             <select class="form-control" name="lokasikrp" id="lokasikrp" required>
                                 <option value="">-- Pilih Lokasi --</option>
                                 <?php
                                    foreach ($hasil as $value) {
                                        echo "<option value='$value->id_lokasi'>$value->nama_lab</option>";
                                    }
                                    ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="sel1">Aset</label>
                             <select class="form-control" name="asetkrp" id="asetkrp" required>
                             </select>
                         </div>


                         <div class="form-group">
                             <label for="">Tanggal Pelaporan</label>
                             <input type="date" name="tgl_lapor" class="form-control" value="<?= $pelaporan->tgl_lapor ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Deskripsi Pelaporan</label>
                             <textarea id="editor" name="editor"></textarea>
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboran/data_pelaporan'); ?>">Back</a>
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