 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg-6">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'admin/newEditDataUserLogin'; ?>" method="post">
                         <div class="form-group">
                             <label for="">Username</label>
                             <input type="hidden" name="id_user" class="form-control" value="<?= $dataUser->id_user ?>">
                             <input type="text" name="username" class="form-control" value="<?= $dataUser->username ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Password</label>
                             <input type="text" name="password" class="form-control" value="">
                         </div>
                         <div class="form-group">
                             <label for="">User Role</label>
                             <select name="role_id" id="form-control" class="form-control">

                                 <?php foreach ($userRole as $ur) :

                                        $idDU = $dataUser->role_id;
                                        $idUR = $ur->id;
                                        if ($idDU == $idUR) {
                                    ?>

                                     <?php } ?>

                                     <option value=<?php echo $ur->id ?>><?php echo $ur->role ?></option>

                                 <?php endforeach; ?>


                             </select>
                         </div>
                         <div class="form-group">
                             <label for="jenis_kelamin">Status Aktif</label><br>
                             <label><input type="radio" name="is_active" value="1" <?php echo ($dataUser->is_active == 1 ? ' checked' : ''); ?>> Aktif</label>
                             <label><input type="radio" name="is_active" value="0" <?php echo ($dataUser->is_active == 0 ? ' checked' : ''); ?>> Tidak Aktif</label>
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />

                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('admin/dataUserLogin'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->