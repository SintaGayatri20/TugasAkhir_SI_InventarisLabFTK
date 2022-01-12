 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg-6">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'admin/neweditdetailbhp'; ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                             <input type="hidden" name="id_detail_bhp" class="form-control" value="<?= $databhp->id_detail_bhp ?>">
                             <label for="">Pilih Bahan</label>
                             <select name="id_master_bhp" id="form-control" class="form-control">
                                 <?php foreach ($dataMaster as $m) :
                                        $idM = $databhp->id_master_bhp;
                                        $idD = $m->id_master_bhp;
                                        if ($idM == $idD) {
                                    ?>
                                     <?php } ?>
                                     <option value=<?php echo $m->id_master_bhp ?>><?= $m->nama_bahan; ?>-<?= $m->satuan; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Pilih Lokasi Lab</label>
                             <select name="id_lokasi" id="form-control" class="form-control">
                                 <?php

                                    $hasil = $this->db->query("SELECT * FROM tb_lokasi ")->result();
                                    foreach ($hasil as $h) {
                                    ?>
                                     <option value="<?php echo $h->id_lokasi; ?>"><?php echo $h->nama_lab; ?></option>

                                 <?php
                                    }
                                    ?>
                             </select>
                         </div>
                         <div class="form-group">

                             <label for="">Nomor BA</label>
                             <input type="text" class="form-control" name="no_ba" value="<?php echo $databhp->no_ba ?>">
                         </div>
                         <div class="form-group">

                             <label for="">Jumlah</label>
                             <input type="text" class="form-control" name="jumlah" value="<?php echo $databhp->jumlah ?>">
                         </div>
                         <div class="form-group">

                             <label for="">Tanggal Perbaikan</label>
                             <input type="date" class="form-control" name="date_time" value="<?php echo $databhp->date_time ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                         <a class="btn btn-warning" href="<?= base_url('laboran/barangHabisPakai'); ?>">Back</a>
                     </form>
                 </section>
             </div>
         </div>
     </div>
 </div>

 </div>


 <!-- /.container-fluid -->