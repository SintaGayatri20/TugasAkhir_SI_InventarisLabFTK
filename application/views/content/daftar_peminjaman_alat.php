<style>
  th,
  td {
    white-space: nowrap;
  }

  div.dataTables_wrapper {
    /*width: 1000px;*/
    margin: 0 auto;
  }
</style>

<?php
$role = $this->session->userdata('role_id');
?>
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Peminjaman Alat</h1>

  </div>



  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <div class="card border-bottom-info shadow h-100 py-3">
          <form class="form-horizontal" method="post">
            <br>


            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h4><a href="#" class="fa fa-desktop">&nbsp;Monitoring Peminjaman</a></h4>
                </button>

                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h4><a href="#" class="fa fa-history sdhaprvpnjm">&nbsp;History Peminjaman</a></h4>
                </button>

              </h2>
            </div>


            <table id="example" class="display" style="width:96%">
              <thead>
                <tr>

                  <th>No BA</th>
                  <th>User</th>
                  <th>Laboran</th>
                  <th>Nama Aset</th>
                  <th>Jumlah Pinjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status Approval</th>
                  <th>Status Peminjaman</th>
                  <th>Keperluan</th>
                  <th>Cetak BAP</th>
                  <th>Evidence</th>


                  <?php
                  if ($role == 5) {
                  ?>
                    <th>Pengembalian</th>
                  <?php
                  } else {
                  ?>
                    <th>Action</th>
                  <?php
                  }
                  ?>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pinjam as $p) {
                  $laboran = $p->laboran;
                  $cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran'");
                  $lbr = $cek_laboran->row_array();
                  $evidence = $p->evidence;
                  $status = $p->status_approve;
                  $sttsk = $p->kembali_status;


                ?>
                  <tr>


                    <td><?php
                        $no_ba1 = $p->no_ba;
                        $nb1 = substr($no_ba1, 0, 6);
                        echo $nb1;

                        ?></td>
                    <td><?php echo $p->nama ?></td>
                    <td><?php echo $lbr['nama']; ?></td>
                    <td><?php echo $p->nama_barang ?></td>
                    <td><?php echo $p->jumlah_pinjam ?></td>
                    <td><?php echo $p->tanggal_pinjam ?></td>
                    <td><?php echo $p->tanggal_kembali ?></td>
                    <td>
                      <?php
                      if ($status == 0) {
                      ?>
                        <a type="button" class="badge badge-primary" style="background-color:red; color:white;">Pending Laboran</a>
                    </td>
                    </td>
                  <?php
                      } else if ($status == 1) {
                  ?>
                    <a type="button" class="badge badge-primary" style="background-color:orange; color:white;">Pending Koorprodi</a></td>
                    </td>
                  <?php
                      } else if ($status == 2) {
                  ?>
                    <a type="button" class="badge badge-success" style="background-color:green; color:white;">Approved</a></td>
                    </td>
                  <?php
                      } else if ($status == 3) {
                  ?>
                    <a type="button" class="badge badge-primary revlb" idrev="<?php echo $p->keterangan_laboran ?>" style="background-color:orange;">Revisi Laboran</a></td>
                    </td>
                  <?php
                      } else {
                  ?>
                    <a href="#" type="button" class="badge badge-primary viewrevkprd" style="background-color:red; color:white;" idvrkprd="<?php echo $p->keterangan_koorprodi ?>">Revisi Koorprodi</a></td>
                    </td>

                  <?php
                      }
                  ?>
                  <td>
                    <?php if ($status == 0 || $status == 1 || $status == 3 || $status == 4) { ?>
                      <p>
                        <center><b>-</b></center>
                      </p>
                    <?php } else if ($status == 2) { ?>

                      <a href="#" type="button" class="badge badge-success" style="background-color:red; color:white;">Belum Mengembalikan aset</a>

                    <?php } ?>
                  </td>
                  </td>
                  <td><?php echo $p->keperluan ?></td>
                  <td align="center"><a class="fa fa-print" aria-hidden="true" href="<?php echo base_url('Cetakbap/cetakbap/' . $p->id_peminjaman) ?>/pnj" target="_blank"></a></td>
                  <td align="center">
                    <?php
                    if ($evidence == "") {
                      $role = $this->session->userdata('role_id');
                      if ($role == 5) {
                    ?>
                        <a href="#" class="btn btn-danger evid" aria-hidden="true" idp=<?php echo $p->id_peminjaman; ?>><span class="fa fa-file"></a>
                  </td>
                <?php
                      } else {
                ?>
                  <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
                <?php
                      }
                    } else { ?>
                <a href="#" class="btn btn-success prev" idp="<?php echo $p->evidence . '-' . $p->id_peminjaman; ?>" dt="<?php echo $p->id_peminjaman ?>" aria-hidden="true"><span class="fa fa-file-pdf"></span></a>
              <?php } ?>

              <?php
                  if ($role == 5) {
              ?>
              <?php
                  } else {
              ?>

                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu">



                      <a class="dropdown-item rev" href="#" idr="<?php echo $p->id_peminjaman; ?>">Revisi</a>

                      <div class="dropdown-divider"></div>

                      <a class="dropdown-item approve" href="#" idp="<?php echo $p->id_peminjaman; ?>">Approve</a>
                    </div>
                  </div>
                </td>
              <?php
                  }
              ?>
              <?php
                  if ($role == 5) {
              ?>
                <td align="center">
                  <?php
                    if ($status == 2) {
                  ?>
                    <a href="#" type="button" class="btn btn-danger kmbl" idk="<?php echo $p->id_peminjaman; ?>" idk1="<?php echo $p->nama_barang; ?>" idk2="<?php echo $p->jumlah_pinjam ?>"><b>X</b></a>
                </td>
              <?php
                    } else {
                    }
              ?>

            <?php
                  } else {
            ?>

            <?php
                  }
            ?>


                  </tr>

                <?php
                  $no++;
                }
                ?>

              </tbody>
            </table>

            <div class="card-header" id="headingOne">
              <h2 class="mb-0">


                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h4><a href="#" class="fa fa-desktop">&nbsp;Monitoring Pengembalian</a></h4>
                </button>

                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h4><a href="#" class="fa fa-history sdhaprv">&nbsp;History Pengembalian</a></h4>
                </button>
              </h2>
            </div>
            <table id="example" class="display">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Laboran</th>
                  <th>Nama Aset</th>
                  <th>Jumlah Pinjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Keperluan</th>
                  <th>Cetak BAP</th>
                  <th>Evidence BA Pengembalian</th>
                  <th>Evidence Laporan Pengembalian</th>
                  <th>Tanggapan</th>
                  <?php
                  if ($role == 5) {
                  ?>

                  <?php
                  } else {
                  ?>
                    <th>Action</th>
                  <?php
                  }
                  ?>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;

                foreach ($kembali as $k) {
                  $laboran_k = $k->laboran;
                  $cek_lbr_k = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran_k'");
                  $lbr_k = $cek_lbr_k->row_array();
                  $evidence_k = $k->evidence;
                  $status_k = $k->status_approve;
                  $evidence_k = $k->evidence_pengembalian;
                  $laporan = $k->laporan_pengembalian;
                ?>

                  <tr>
                    <td>
                      <?php $no_ba = $k->no_ba;
                      $nb = substr($no_ba, 0, 6);
                      echo $nb;
                      $stk = $k->kembali_status;

                      if ($stk == 0) {
                        $st = '<a type=button class=badge badge-success style=background-color:orange; font-color:white;>Pending Laboran</a>';
                      } else if ($stk == 1) {
                        $st = '<a type=button class=badge badge-success style=background-color:orange; color:white;>Pending Koorpordi</a>';
                      } else {
                        $st = '<a type=button class=badge badge-success style=background-color:green; color:white;>Approved</a>';
                      }

                      ?></td>
                    <td><?php echo $k->nama; ?></td>
                    <td><?php echo $lbr_k['nama']; ?></td>
                    <td><?php echo $k->nama_barang; ?></td>
                    <td><?php echo $k->jumlah_pinjam; ?></td>
                    <td><?php echo $k->tanggal_pinjam ?></td>
                    <td><?php echo $k->tanggal_kembali ?></td>
                    <td><?php echo $st; ?></td>
                    <td><?php echo $k->keperluan ?></td>
                    <td align="center"><a class="fa fa-print" aria-hidden="true" href="<?php echo base_url('Cetakbap/cetakbap/' . $k->id_peminjaman) ?>/kmb" target="_blank"></a></td>

                    <td align="center">
                      <?php
                      if ($evidence_k == "") {
                        $role = $this->session->userdata('role_id');
                        if ($role == 5) {
                      ?>
                          <a href="#" class="btn btn-danger evid_k" aria-hidden="true" idp=<?php echo $k->id_peminjaman; ?>><span class="fa fa-file"></a>
                    </td>
                  <?php
                        } else {
                  ?>
                    <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
                  <?php
                        }
                      } else { ?>
                  <a href="#" class="btn btn-success prev" idp="<?php echo $k->evidence_pengembalian . '-' . $k->id_peminjaman; ?>" dt="<?php echo $k->id_peminjaman ?>" aria-hidden="true"><span class="fa fa-file-pdf"></span></a>
                <?php } ?>


                </td>
                <td align="center">
                  <?php
                  if ($laporan == "") {
                    $role = $this->session->userdata('role_id');
                    if ($role == 5) {
                  ?>
                      <a href="#" class="btn btn-danger laporan" aria-hidden="true" idp=<?php echo $k->id_peminjaman; ?>><span class="fa fa-file"></a>
                </td>
              <?php
                    } else {
              ?>
                <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
              <?php
                    }
                  } else { ?>
              <a href="#" class="btn btn-success prev_lporan" idps="<?php echo $k->laporan_pengembalian; ?>" dt="<?php echo $k->id_peminjaman ?>" aria-hidden="true"><span class="fa fa-file-pdf"></span></a>
            <?php } ?>
            </td>
            <td><?php echo $k->catatan_kembali; ?></td>
            <?php
                  if ($role == 5) {
            ?>
            <?php
                  } else {
            ?>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item approve_kmbl" href="#" idtkb="<?php echo $k->id_peminjaman; ?>">Approve</a>
                    <div class="dropdown-divider"></div>
                  </div>
                </div>
              </td>
            <?php
                  }
            ?>
                  </tr>
                <?php
                  $no++;
                }
                ?>

              </tbody>
            </table>
            <div class="form-group">
              <label class="control-label col-md-3"></label>
              <div class="col-md-8">

              </div>
            </div>
            <!-- <div class="form-group">
              <div class="col-md-8">
                <a href="" class="btn btn-warning mb-3" style="float:left"><i class=" fas fa-print"></i> Cetak Surat Keterangan Bebas Lab</a>

              </div>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>

  <br>

  <div class="modal fade" id="Modalku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Upload Evidence</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <?php echo form_open("upload/tambah", array('enctype' => 'multipart/form-data')); ?>
          <div class="form-group">

            <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Evidence</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="evidence">
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Upload" />
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>



  <div class="modal fade" id="Modalkemb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Upload Evidence Pengembalian</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <?php echo form_open("upload/tambah", array('enctype' => 'multipart/form-data')); ?>
          <div class="form-group">

            <input type="hidden" class="form-control" id="id_peminjaman_k" name="id_peminjaman">
            <input type="hidden" class="form-control" id="opsi" name="opsi" value="1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Evidence</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="evidence">
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Upload" />
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>


  <div class="modal fade bd-example-modal-lg" id="ModalPrev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><?php
                                                          if ($role == 5) { ?>
              Preview/Update Evidence Pengembalian
            <?php
                                                          } else {
            ?>
              Preview Evidence
            <?php
                                                          }
            ?>
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <?php
          if ($role == 5) {
            echo form_open("upload/ubah", array('enctype' => 'multipart/form-data'));
          } else {
            echo form_open("laboran/laboranapprove", array('enctype' => 'multipart/form-data'));
          }
          ?>
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_peminjamans" name="id_peminjamans">
            <input type="hidden" class="form-control" id="opsi" name="opsi" value="1">
            <input type="hidden" class="form-control" id="evidence" name="evidence">
            <div id="view_pdf" style="text-align:center;">
            </div>
          </div>
          <?php
          if ($role == 5) {

          ?>
            <div class="form-group">
              <label for="exampleFormControlFile1">Upload Evidence</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="evidence">
            </div>

        </div>
        <div class="modal-footer">

          <input type="submit" name="submit" class="btn btn-primary" value="Upload" />
        </div>
      <?php
          } else {
      ?>
      </div>
      <div class="modal-footer">
      </div>
    <?php } ?>
    <?php echo form_close(); ?>
    </div>
  </div>
</div>



<div class="modal fade" id="ModalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Approve Peminjaman Alat</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php

        foreach ($approval as $a);
        ?>

        <?php echo form_open("laboran/laboranapprove", array('enctype' => 'multipart/form-data')); ?>
        <div class="form-group">

          <input type="hidden" class="form-control" id="id_peminjaman_app" name="id_peminjaman">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">No Induk Koorprodi</label>
          <input type="text" class="form-control" id="approval_koorpordi" name="approval" value="<?php echo $a->no_induk; ?>" readonly>
        </div>

        <div class="form-group">
          <label for="exampleFormControlFile1">Nama Koorprodi</label>
          <input type="text" class="form-control" id="nama_koorpordi" name="nama_koorpordi" value="<?php echo $a->nama; ?>" readonly>
        </div>

      </div>
      <div class="modal-footer">

        <input type="submit" name="submit" class="btn btn-primary" value="Approve" />
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalRev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel"><b>Revisi Peminjaman Alat</b></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php

        foreach ($approval as $a);
        ?>

        <?php echo form_open("laboran/revisilaboran", array('enctype' => 'multipart/form-data')); ?>
        <input type="hidden" class="form-control" id="id_peminjaman_rev" name="id_peminjaman">

        <div class="form-group">
          <label for="exampleFormControlFile1">Alasan Revisi</label>
          <textarea class="form-control" name="alasan_revisi"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-warning" value="Revisi" />
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalRevlab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Revisi Peminjaman Alat</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleFormControlFile1">Alasan Revisi</label>
          <div id="view_rev"></div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalViewKprd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Revisi Peminjaman Alat</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleFormControlFile1">Alasan Revisi</label>
          <div id="view_rev_kprd"></div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalKmbl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Pengembalian Alat</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('user/updatepengembalian'); ?>" method="post">
          <div class="form-group">
            <label for="exampleFormControlFile1">Nama Aset</label>
            <input type="hidden" name="id_pinjam" id="id_pinjam" class="form-control" />
            <input type="text" name="nama_aset" id="nama_aset" class="form-control" readonly />
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Jumlah</label>
            <input type="text" name="jumlah_aset" id="jumlah_aset" class="form-control" readonly />
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-success" value="Proses" />
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Baru Meminjam Modal-->
<div class="modal fade" id="baruminjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
<!-- End Baru Meminjam Modal-->

<div class="modal fade bd-example-modal-lg" id="ModalAprPnj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">History Peminjaman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

        <table id="example" class="display" style="width:96%">
          <thead>
            <tr>
              <th>No BA</th>
              <th>User</th>
              <th>Laboran</th>
              <th>Nama Aset</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Keperluan</th>
              <th>Cetak BAP</th>

              <th>Evidence</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($historypinjam as $h) {
              $laboran_h = $h->laboran;
              $cek_laboran_h = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran_h'");
              $lbr_h = $cek_laboran_h->row_array();
              $evidence_h = $h->evidence;
              $status_h = $h->status_approve;
            ?>
              <tr>
                <td><?php
                    $no_ba1 = $h->no_ba;
                    $nb1_h = substr($no_ba1, 0, 6);
                    echo $nb1_h;

                    ?></td>
                <td><?php echo $h->nama ?></td>
                <td><?php echo $lbr_h['nama']; ?></td>
                <td><?php echo $h->nama_barang ?></td>
                <td><?php echo $h->jumlah_pinjam ?></td>
                <td><?php echo $h->tanggal_pinjam ?></td>
                <td><?php echo $h->tanggal_kembali ?></td>
                <td>
                  <?php
                  if ($status_h == 0) {
                  ?>
                    <a type="button" class="badge badge-primary" style="background-color:red; color:white;">Pending Laboran</a>
                </td>
                </td>
              <?php
                  } else if ($status_h == 1) {
              ?>
                <a type="button" class="badge badge-primary" style="background-color:orange; color:white;">Pending Koorprodi</a></td>
                </td>
              <?php
                  } else if ($status_h == 2) {
              ?>
                <a type="button" class="badge badge-success" style="background-color:green; color:white;">Approved</a></td>
                </td>
              <?php
                  } else if ($status_h == 3) {
              ?>
                <a type="button" class="badge badge-primary revlb" idrev="<?php echo $h->keterangan_laboran ?>" style="background-color:orange;">Revisi Laboran</a></td>
                </td>
              <?php
                  } else {
              ?>
                <a href="#" type="button" class="badge badge-primary viewrevkprd" style="background-color:red; color:white;" idvrkprd="<?php echo $h->keterangan_koorprodi ?>">Revisi Koorprodi</a></td>
                </td>

              <?php
                  }
              ?>
              <td><?php echo $h->keperluan ?></td>
              <td align="center"><a class="fa fa-print" aria-hidden="true" href="<?php echo base_url('Cetakbap/cetakbap/' . $h->id_peminjaman) ?>/pnj" target="_blank"></a></td>

              <td align="center">
                <?php
                if ($evidence_h == "") {
                  $role_h = $this->session->userdata('role_id');
                  if ($role_h == 5) {
                ?>
                    <a href="#" class="btn btn-danger evid" aria-hidden="true" idp=<?php echo $h->id_peminjaman; ?>><span class="fa fa-file"></a>
              </td>
            <?php
                  } else {
            ?>
              <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
            <?php
                  }
                } else { ?>
            <a href="<?php echo base_url('bap/' . $h->evidence); ?>" class="btn btn-success" target="_blank"><span class="fa fa-file-pdf"></span></a></td>
          <?php } ?>




              </tr>

            <?php
              $no++;
            }
            ?>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>

      </form>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" id="ModalApr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">History Pengembalian</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <table id="example" class="display">
          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Laboran</th>
              <th>Nama Aset</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Keperluan</th>
              <th>Cetak BAP</th>
              <th>Evidence BA Pengembalian</th>
              <th>Evidence Laporan Pengembalian</th>
              <th>Tanggapan</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;

            foreach ($historykembali as $hk) {
              $laboran_hk = $hk->laboran;
              $cek_lbr_hk = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran_hk'");
              $lbr_hk = $cek_lbr_hk->row_array();
              $evidence_hk = $hk->evidence;
              $status_hk = $hk->status_approve;
              $evidence_hk = $hk->evidence_pengembalian;
              $laporan_hk = $hk->laporan_pengembalian;
            ?>

              <tr>
                <td>
                  <?php $no_ba_hk = $hk->no_ba;
                  $nb_hk = substr($no_ba_hk, 0, 6);
                  echo $nb_hk;
                  $stk_hk = $hk->kembali_status;

                  if ($stk_hk == 0) {
                    $st_hk = '<a type=button class=badge badge-success style=background-color:orange; font-color:white;>Pending Laboran</a>';
                  } else if ($stk_hk == 1) {
                    $st_hk = '<a type=button class=badge badge-success style=background-color:orange; color:white;>Pending Koorpordi</a>';
                  } else {
                    $st_hk = '<a type=button class=badge badge-success style=background-color:green; color:white;>Approved</a>';
                  }

                  ?></td>
                <td><?php echo $hk->nama; ?></td>
                <td><?php echo $lbr_hk['nama']; ?></td>
                <td><?php echo $hk->nama_barang; ?></td>
                <td><?php echo $hk->jumlah_pinjam; ?></td>
                <td><?php echo $hk->tanggal_pinjam ?></td>
                <td><?php echo $hk->tanggal_kembali ?></td>
                <td><?php echo $st_hk; ?></td>
                <td><?php echo $hk->keperluan ?></td>
                <td align="center"><a class="fa fa-print" aria-hidden="true" href="<?php echo base_url('Cetakbap/cetakbap/' . $hk->id_peminjaman) ?>/kmb" target="_blank"></a></td>

                <td align="center">
                  <?php
                  if ($evidence_hk == "") {
                    $role_hk = $this->session->userdata('role_id');
                    if ($role_hk == 5) {
                  ?>
                      <a href="#" class="btn btn-danger evid_k" aria-hidden="true" idp=<?php echo $hk->id_peminjaman; ?>><span class="fa fa-file"></a>
                </td>
              <?php
                    } else {
              ?>
                <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
              <?php
                    }
                  } else { ?>
              <a href="<?php echo base_url('bap/' . $hk->evidence_pengembalian) ?>" class="btn btn-success" target="_blank"><span class="fa fa-file-pdf"></span></a>
            <?php } ?>
            </td>
            <td align="center">
              <?php
              if ($laporan_hk == "") {
                $role_hk = $this->session->userdata('role_id');
                if ($role_hk == 5) {
              ?>
                  <a href="#" class="btn btn-danger laporan" aria-hidden="true" idp=<?php echo $hk->id_peminjaman; ?>><span class="fa fa-file"></a>
            </td>
          <?php
                } else {
          ?>
            <a href="#" class="btn btn-danger" aria-hidden="true"><span class="fa fa-file"></a></td>
          <?php
                }
              } else { ?>
          <a href="<?php echo base_url('laporan/' . $hk->laporan_pengembalian); ?>" class="btn btn-success" target="_blank"><span class="fa fa-file-pdf"></span></a>
        <?php } ?>
        </td>

        <td><?php echo $hk->catatan_kembali; ?></td>
              </tr>
            <?php
              $no++;
            }
            ?>

          </tbody>
        </table>

      </div>
      <div class="modal-footer">
      </div>

      </form>
    </div>
  </div>
</div>




<div class="modal fade" id="Modalpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Upload Laporan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("upload/tambah_laporan", array('enctype' => 'multipart/form-data')); ?>
        <div class="form-group">

          <input type="hidden" class="form-control" id="id_peminjaman_lp" name="id_peminjaman">

        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Upload Evidence</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="evidence">
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="Upload" />
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="ModalPrevLporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><?php
                                                        if ($role == 5) { ?>
            Preview/Update Evicence Laporan
          <?php
                                                        } else {
          ?>
            Preview Evidence
          <?php
                                                        }
          ?>
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php
        if ($role == 5) {
          echo form_open("upload/ubah_laporan", array('enctype' => 'multipart/form-data'));
        } else {
          echo form_open("laboran/laboranapprove", array('enctype' => 'multipart/form-data'));
        }
        ?>
        <div class="form-group">
          <input type="hidden" class="form-control" id="id_peminjaman_kmbl" name="id_peminjamans">
          <input type="hidden" class="form-control" id="evidence" name="evidence">
          <div id="view_pdfs" style="text-align:center;">
          </div>
        </div>
        <?php
        if ($role == 5) {

        ?>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Evidence</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="evidence">
          </div>

      </div>
      <div class="modal-footer">

        <input type="submit" name="submit" class="btn btn-primary" value="Upload" />
      </div>
    <?php
        } else {
    ?>
    </div>
    <div class="modal-footer">
    </div>
  <?php } ?>
  <?php echo form_close(); ?>
  </div>
</div>
</div>


<div class="modal fade" id="ModalAppKmbl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel"><b>Approve Pengembalian Alat</b></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

        <?php echo form_open("laboran/kembalilaboran", array('enctype' => 'multipart/form-data')); ?>
        <input type="hidden" class="form-control" id="id_peminjaman_kmbli" name="id_peminjaman">

        <div class="form-group">
          <label for="exampleFormControlFile1">Catatan</label>
          <textarea class="form-control" name="catatan" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-success" value="Approve" />
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>


<div class="modal fade" id="StatusPinjam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel"><b>Status Pinjam</b></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">

        <?php echo form_open("laboran/kembalilaboran", array('enctype' => 'multipart/form-data')); ?>
        <input type="hidden" class="form-control" id="id_status" name="id_status">

        <!-- <div class="form-group">
          <label for="exampleFormControlFile1">Revisi Koorprodi</label>
          <input type="text" class="form-control" id="r_koorprodi" name="r_koorprodi" readonly>
        </div> -->


        <div class="form-group">
          <label for="exampleFormControlFile1">Revisi Laboran</label>
          <input type="text" class="form-control" id="r_laboran" name="r_laboran" readonly>
        </div>


      </div>
      <!-- <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-success" value="Approve" />
      </div> -->
      <?php echo form_close(); ?>
    </div>
  </div>
</div>