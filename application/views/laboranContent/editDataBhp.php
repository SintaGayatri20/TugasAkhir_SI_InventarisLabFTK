 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg-6">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'Laboran/neweditdatabhp'; ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                             <input type="hidden" name="id_master_bhp" class="form-control" value="<?= $dataBhp->id_master_bhp ?>">
                             <label for="">Nama Bahan</label>
                             <input type="text" name="nama_bahan" class="form-control" value="<?= $dataBhp->nama_bahan ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Satuan</label>
                             <input type="text" name="satuan" class="form-control" value="<?= $dataBhp->satuan ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $dataBhp->foto ?>">
                             <label for="">Foto</label>
                             <input type="file" name="image" class="form-control" value="<?= $dataBhp->foto ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboran/masterbhp'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 </div>


 <!-- /.container-fluid -->