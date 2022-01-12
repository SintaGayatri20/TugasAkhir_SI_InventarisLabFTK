 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'laboran/newEditDataProdi'; ?>" method="post">
                         <div class="form-group">
                             <label for="">Nama Prodi</label>
                             <input type="hidden" name="id_prodi" class="form-control" value="<?= $dataProdi->id_prodi ?>">
                             <input type="text" name="nama_prodi" class="form-control" value="<?= $dataProdi->nama_prodi ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Jurusan</label>
                             <input type="text" name="jurusan" class="form-control" value="<?= $dataProdi->jurusan ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Fakultas</label>
                             <input type="text" name="fakultas" class="form-control" value="<?= $dataProdi->fakultas ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />

                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboran/dataProdi'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- /.container-fluid -->