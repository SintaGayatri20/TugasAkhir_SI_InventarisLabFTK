 <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
     </button>
 </div>

 <div class="modal-body">
     <div class="form-group">
         <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="<?php echo $newtgp['id_peminjaman']; ?>" readonly>
     </div>
     <div class="form-group">
         <label for="">Catatan Kembali</label>
         <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="<?php echo $newtgp['catatan_kembali']; ?>" readonly>
     </div>
     <div class="form-group">
         <label for="">Tanggapan Laboran</label>
         <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="<?php echo $newtgp['keterangan_laboran']; ?> " readonly>
     </div>
 </div>