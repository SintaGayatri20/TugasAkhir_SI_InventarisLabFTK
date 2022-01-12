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

    table.center {
        margin-left: auto;
        margin-right: auto;
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

foreach ($pinjam as $p);

$tgl = $p->date;

$tahun = date('Y');
$bulan = substr($tgl, 5, 2);
$tanggal = substr($tgl, 8, 2);

$nbulan = bulans($bulan);


$cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk a, user b WHERE a.no_induk=b.username AND b.role_id=2");
$lbr = $cek_laboran->row_array();


?>

<p align="center"><b>SURAT KETERANGAN</b></p><br>
<p align="center"><b>BEBAS PINJAMAN ALAT LABORATORIUM</b></p><br><br><br>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini, laboran Prodi <?php echo $p->nama_prodi; ?> menerangkan bahwa :
</p><br>

<table class="center">
    <thead>
        <tr>
            <!-- <th></th> -->
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- <td></td> -->
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $p->nama; ?></td>
        </tr>
        <tr>
            <!-- <td></td> -->

            <td>NIM</td>
            <td>:</td>
            <td><?php echo $p->nim; ?></td>

        </tr>
        <tr>
            <!-- <td></td> -->

            <td>Konsentrasi</td>
            <td>:</td>
            <td><?php echo $p->konsentrasi; ?></td>

        </tr>
        <tr>
            <!-- <td></td> -->
            <td>Prodi</td>
            <td>:</td>
            <td><?php echo $p->nama_prodi; ?></td>

        </tr>
        <tr>
            <!-- <td></td> -->

            <td>Judul Skripsi</td>
            <td>:</td>
            <td><?php echo $p->judul_skripsi; ?></td>

        </tr>
    </tbody>

</table>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan ini dinyatakan sudah bebas dari peminjaman alat-alat Lab di Prodi <?php echo $p->nama_prodi; ?><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jurusan <?php echo $p->jurusan; ?>. Demikian surat keterangan ini dibuat agar dapat digunakan sebagaimana<br></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mestinya.</p>
</p><br><br><br>


<p style="margin-left:425px;">Singaraja, <?php echo $tanggal ?> <?php echo $nbulan ?> <?php echo $tahun ?></p><br>
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
            <td>Laboran,</td>
        </tr>
        <tr>
            <td><br><br><br><br></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <u><?= $lbr['nama']; ?></u><br>
                NIP. <?= $lbr['no_induk']; ?>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <u><?php echo $user['nama'] ?></u><br>
                NIP/NIDK.<?php echo $user['no_induk'] ?>
            </td>
        </tr>
    </tbody>

</table>