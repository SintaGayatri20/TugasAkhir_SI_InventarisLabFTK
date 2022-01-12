 <!-- Begin Page Content -->
 <div class="container-fluid">

     <script src="<?php echo base_url('assets/ck_assets/ckeditor.js'); ?>"></script>
     <script src="<?php echo base_url('assets/ck_assets/sample/js/sample.js'); ?>"></script>
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <?php if ($error = $this->session->flashdata('msg')) { ?>
         <div class="alert alert-success" id="msg">
             <a href="#" class="close" data-dismiss="alert">&times;</a>
             <strong>Success!</strong> <?php echo $error; ?>
         </div>

     <?php } ?>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'user/newEditDataBl'; ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                             <label for="">Nama Lengkap</label>
                             <input type="hidden" name="id_bebas_lab" id="id_bebas_lab" class="form-control" value="" readonly>
                             <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                         </div>

                         <div class="form-group">
                             <label for="">NIM</label>
                             <input type="text" name="nim" id="nim" class="form-control" value="<?= $user['no_induk'] ?>" readonly>
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
                                     <option value=<?php echo $dp->id_prodi ?>><?php echo $dp->nama_prodi ?>-<?php echo $dp->jurusan ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Konsentrasi</label>
                             <input type="text" name="konsentrasi" class="form-control" value="<?= $dataLokasi->konsentrasi ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Judul Skripsi</label>
                             <textarea id="editor" name="editor"></textarea>
                         </div>
                         <div class="form-group">
                             <label for="">Tanggal Upload</label>
                             <input type="date" name="date" class="form-control" value="<?= $dataLokasi->date ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('user/isidatabl'); ?>">Back</a>
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