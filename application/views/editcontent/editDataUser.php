 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg-6">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'admin/newEditDataUser'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <label for="">Nama</label>

                             <input type="text" name="nama" class="form-control" value="<?= $dataUser->nama ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="no_induk" class="form-control" value="<?= $dataUser->no_induk ?>">
                             <label for="">Nomor Induk</label>
                             <select name="id_user" id="form-control" class="form-control" required>
                                 <option value="">--Pilih Nomor Induk--</option>
                                 <?php foreach ($userdata as $u) : ?>
                                     <option value=<?php echo $u->id_user ?>><?php echo $u->username ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Prodi</label>
                             <input type="hidden" name="id_prodi" class="form-control" value="<?= $dataUser->id_prodi ?>">
                             <select name="id_prodi" id="form-control" class="form-control" required>
                                 <option value="">--Pilih Prodi--</option>
                                 <?php foreach ($dataProdi as $dp) : ?>
                                     <option value=<?php echo $dp->id_prodi ?>><?php echo $dp->nama_prodi ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="text" name="email" class="form-control" value="<?= $dataUser->email ?>">
                         </div>
                         <div class="form-group">
                             <label for="">No.Hp</label>
                             <input type="text" name="no_hp" class="form-control" value="<?= $dataUser->no_hp ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Alamat</label>
                             <input type="text" name="alamat" class="form-control" value="<?= $dataUser->alamat ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Jabatan</label>
                             <input type="text" name="jabatan" class="form-control" value="<?= $dataUser->jabatan ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Date Created</label>
                             <input type="date" name="date_created" class="form-control" value="<?= $dataUser->date_created ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?= $dataUser->foto_profile ?>">
                             <label for="">Foto</label>
                             <input type="file" name="image" class="form-control" value="<?= $dataUser->foto_profile ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />

                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('admin/dataUser'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->