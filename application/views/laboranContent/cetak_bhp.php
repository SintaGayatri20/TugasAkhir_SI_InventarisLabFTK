  <style>
      table {
          border-collapse: collapse;
      }

      table,
      th,
      td {
          border: 1px solid black;
      }

      th,
      td {
          padding: 10px;
      }

      th {
          color: black;
      }
  </style>

  <style>
      #background {
          position: relative;
          z-index: 0;
          background: white;
          display: block;
          min-height: 50%;
          min-width: 100%;
          color: yellow;
      }

      #content {
          position: relative;
          z-index: 1;
      }

      #bg-text {
          color: lightgrey;
          font-size: 60px;
          transform: rotate(300deg);
          -webkit-transform: rotate(300deg);
      }
  </style>
  <title>Form BAP</title>
  <style>
      p {
          line-height: 10px;
      }

      h2 {
          line-height: 10px;
      }
  </style>


  <?php
    $kopsurat = $this->db->query("SELECT * FROM tb_kopsurat WHERE status=1")->result_array();
    foreach ($kopsurat as $ks);
    ?>
  <table width="600px" border="0">
      <tr>
          <td align="left"><img src="assets/media/<?= $ks['logo'] ?>" style="position: relative; width: 100px; height: auto;"></td>

          <td style="width: 400px;">
              <p align="center"><?= $ks['konten_kopsurat'] ?></p>
          </td>
      </tr>

  </table>
  <hr />
  <?php



    foreach ($klb as $k);
    foreach ($bhp as $b);



    /*$laboran = $p->laboran;
$cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran'");
$lbr = $cek_laboran->row_array();*/


    ?>


  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor : <?php echo $b->no_ba; ?></p><br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hal : Permohonan Bahan Praktikum di <?php echo $b->nama_lab; ?></p><br><br><br>

  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada</p><br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yth.&nbsp;&nbsp;&nbsp;&nbsp;Bapak Wakil Dekan II</p><br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.q Bagian Perlengkapan Fakultas Teknik dan Kejuruan</p><br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Undiksha, Singaraja</p><br>
  <br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan hormat,</p><br>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demi kelancaran&nbsp;perkuliahan/praktikum&nbsp;mahasiswa&nbsp;&nbsp;&nbsp;semester&nbsp;&nbsp;genap/ganjil &nbsp;Tahun&nbsp;&nbsp;&nbsp; Akademik </p><br>
  <?php

    $tgl = date('d-m-Y');
    $array = explode("-", $tgl);

    $bln = $array[1];
    $thn = $array[2];
    $thn_sblm = $thn - 1;
    $tahun_stlh = $thn + 1;
    ?>

  <?php if ($bln > 1 and $bln < 8) { ?>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $thn_sblm . '/' . $thn; ?> &nbsp;&nbsp;yang&nbsp;&nbsp;&nbsp;&nbsp; akan&nbsp;&nbsp;segera&nbsp;&nbsp;&nbsp;dilaksanakan, &nbsp;&nbsp;&nbsp;&nbsp;maka bersama &nbsp;&nbsp;ini kami mengajukan permohonan </p><br>
  <?php } ?>



  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;permintaan perbaikan peralatan pada <?php echo $b->nama_lab; ?> seperti pada daftar dibawah ini sebagai berikut :</p><br>

  <table align="center" width="80%" border="1" cellspacing="0" cellpadding="0">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Bahan</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Spesifikasi Barang</th>
          </tr>
      </thead>
      <tbody align="center">
          <?php $i = 1;
            foreach ($bhp as $b) {
            ?>

              <tr>
                  <td scope="row"><?= $i; ?></td>
                  <td><?= $b->nama_bahan; ?></td>
                  <td><?= $b->jumlah; ?></td>
                  <td><?= $b->satuan; ?></td>
                  <td><img src="assets/media/<?= $b->foto; ?>" width="150" height="100" /></td>
              </tr>
          <?php $i++;
            }
            ?>
      </tbody>
  </table>

  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian&nbsp;&nbsp;&nbsp; surat ini &nbsp;&nbsp;&nbsp;kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p><br>

  <br><br>
  <?php
    function bulans($bulan)
    {
        switch ($bulan) {
            case "01":
                $bulan = "Januari";
                break;
            case "02":
                $bulan = "Februari";
                break;
            case "03":
                $bulan = "Maret";
                break;
            case "04":
                $bulan = "April";
                break;
            case "05":
                $bulan = "Mei";
                break;
            case "06":
                $bulan = "Juni";
                break;
            case "07":
                $bulan = "Juli";
                break;
            case "08":
                $bulan = "Agustus";
                break;
            case "09":
                $bulan = "September";
                break;
            case "10":
                $bulan = "Oktober";
                break;
            case "11":
                $bulan = "November";
                break;
            case "12":
                $bulan = "Desember";
                break;
        }
        return $bulan;
    }
    foreach ($bhp as $b);
    $tgl = $b->date_time;

    $tahun = date('Y');
    $bulan = substr($tgl, 5, 2);
    // $bulan = substr($tglpinjam, 5, 2);
    $tanggal = substr($tgl, 8, 2);

    $nbulan = bulans($bulan);
    ?>
  <p style="margin-left:400px;">Singaraja, <?php echo $tanggal; ?> <?php echo $nbulan ?> <?php echo $tahun ?></p><br>

  <table align="center" border="0">
      <thead>
          <tr>
              <td>Mengetahui</td>
              <th></th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Ketua Lab FTK</td>
              <td></td>
              <td>Korprodi <?= $p->nama_prodi; ?></td>
          </tr>
          <tr>
              <td><br><br></td>
              <td></td>
              <td></td>
          </tr>
          <tr>
              <td>
                  <u><?php echo $k->nama; ?></u><br>
                  NIP. <?php echo $k->username; ?>
              </td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>
                  <u><?= $user['nama']; ?></u><br>
                  NIP. <?= $user['no_induk']; ?>
              </td>
          </tr>
      </tbody>

  </table>