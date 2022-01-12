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
?>

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

foreach ($pinjam as $p);

$tglpinjam = $p->tanggal_kembali;

$tahun = date('Y');
$bulan = substr($tglpinjam, 5, 2);
$tanggal = substr($tglpinjam, 8, 2);

$nbulan = bulans($bulan);

$laboran = $p->laboran;
$cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran'");
$lbr = $cek_laboran->row_array();


?>

<table width="600px" border="0">
    <tr>
        <td align="left"><img src="" style="position: relative; width: 100px; height: auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

        <td style="width: 400px;">
            <p align="center"><b>BERITA ACARA</b></p><br>
            <p align="center"><b>PENGEMBALIAN SARANA/PRASARANA LAB FTK</b></p><br>
            <p align="center"><b>Nomor :<?php echo $p->no_ba; ?></p><br><br><br>
    </tr>

</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini Tanggal <b><?php echo $tanggal; ?></b> Bulan <b><?php echo $nbulan ?></b> Tahun <b><?php echo $tahun ?></b>, kami yang bertanda tangan di bawah ini :
</p><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $p->nama; ?></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP/NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $p->id_user; ?></p>
<br><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini Tanggal <b><?php echo $tanggal; ?></b> Bulan <b><?php echo $nbulan ?></b> Tahun <b><?php echo $tahun ?></b>, kami yang bertanda tangan di bawah ini :
</p><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $lbr['nama']; ?></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP/NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $p->laboran; ?></p>

<br><br>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selaku Peminjam Sarana/Prasaranan selanjutnya disebut PIHAK KEDUA</p>

<br><br> <br>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pihak kedua telah meminjam <b><?php echo $p->nama_barang; ?></b> </p>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mulai Tanggal <b><?php echo $tanggal; ?></b> Bulan <b><?php echo $nbulan; ?></b> Tahun <b><?php echo $tahun; ?></b> untuk
keperluan <?php echo $p->keperluan; ?>


<br><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian berita acara ini dibuat sebagai landasan dalam pertanggungjawaban
    penggunaan sarana dan </p>
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; prasaranan Lab FTK. Akhir Kata sekian dan Terima Kasih</p>
<br><br><br><br>
<p style="margin-left:400px;">Singaraja, <?php echo $tanggal ?> <?php echo $nbulan ?> <?php echo $tahun ?></p><br>
<table align="center" border="0">

    <tbody>
        <tr>
            <td>Pihak Pertama,</td>
            <td></td>
            <td>Pihak Kedua,</td>
        </tr>
        <tr>
            <td><br><br><br><br></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <u><?php echo $p->nama; ?></u><br>
                NIP/NIM. <?php echo $p->id_user; ?>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <u><?php echo $lbr['nama'] ?></u><br>
                NIP/NIDK. <?php echo $p->laboran; ?>
            </td>
        </tr>
    </tbody>

</table>