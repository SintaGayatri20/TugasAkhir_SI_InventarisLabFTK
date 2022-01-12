 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'peminjaman/newKembalikanBrg'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <label for="">Nama Peminjam</label>
                             <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Nama Barang</label>
                             <input type="text" name="kode_aset" class="form-control" value="<?= $dataPinjaman->kode_aset ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Jumlah</label>
                             <input type="text" name="jumlah" class="form-control" value="<?= $dataPinjaman->jumlah ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Keterangan</label>
                             <input type="text" name="keterangan" class="form-control" value="<?= $dataPinjaman->status ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="id_user" class="form-control" value="<?= $user['id']; ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Kembalikan" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('pinjambarang'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->