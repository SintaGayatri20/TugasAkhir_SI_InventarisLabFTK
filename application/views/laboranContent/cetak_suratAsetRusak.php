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



foreach ($asetrusak as $k);
foreach ($noba as $b);



/*$laboran = $p->laboran;
$cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran'");
$lbr = $cek_laboran->row_array();*/


?>
<?php
foreach ($count as $c);
foreach ($nba as $n);

$no_ba = $c->ca;
$format = $n->no_ba;

$no_baa = $no_ba + 1;

$fix_ba = $no_baa . $format;
?>


<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor : 0<?php echo $fix_ba . date('Y') ?></p><br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hal : Permohonan Perbaikan <?php echo $k->nama_barang; ?> <?php echo $k->nama_lab; ?></p><br><br><br>

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



<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;permintaan perbaikan peralatan pada <?php echo $k->nama_lab; ?> seperti pada daftar dibawah ini sebagai berikut :</p><br>



<table style="margin-left:22.25pt;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 58.5pt;border: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;line-height:140%;'><strong><span style='font-size:15px;line-height:  140%;font-family:"Times New Roman",serif;'>No.</span></strong></p>
            </td>
            <td rowspan="2" style="width: 1.25in;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>Nama Barang</span></strong></p>
            </td>
            <td colspan="2" rowspan="2" style="width: 99pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>Jumlah Satuan</span></strong></p>
            </td>
            <td colspan="2" style="width: 181.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>Keterangan</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 94.5pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 26.95pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>Rusak Ringan</span></strong></p>
            </td>
            <td style="width: 86.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 26.95pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><strong><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'>Rusak Berat</span></strong></p>
            </td>
        </tr>
        <?php foreach ($asetrusak as $ar); ?>
        <?php $i = 1; ?>
        <tr>
            <td style="width: 58.5pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'><?= $i; ?></span></p>
            </td>
            <td style="width: 1.25in;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;line-height:140%;'><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'><?php echo $ar->nama_barang ?></span></p>
            </td>
            <td style="width: 49.5pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'><span style='font-size:15px;line-height:140%;font-family:"Times New Roman",serif;'><?php echo $ar->jumlah ?></span></p>
            </td>
            <td style="width: 49.5pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;line-height:140%;'><span style='font-size:15px;line-height:  140%;font-family:"Times New Roman",serif;'><?php echo $ar->satuan ?></span></p>
            </td>
            <td style="width: 94.5pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;line-height:140%;'><span style='font-size:15px;line-height:  140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
            </td>
            <?php if ($ar->keterangan == "Rusak Berat") { ?>
                <td style="width: 86.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                    <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;text-align:center;line-height:140%;'>
                        <center><img src="assets/media/centang.png" width="20" height="20" /></center>
                    </p>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="6" style="width: 428.55pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Times New Roman",serif;'>Dokumentasi Inventaris :</span></p>
                <p>
                    <?php $f = $ar->foto ?>
                    <?php if ($f == '') { ?>
                        <center>
                            <p style="color: red;">No Imange!</p>
                        </center>
                    <?php } else { ?>
                        <center><img src="assets/media/<?= $f  ?>" width="150" height="100" /></center>
                    <?php } ?>
                </p>
                <p style='margin:0in;font-size:13px;font-family:"Calibri",sans-serif;margin-right:12.0pt;line-height:140%;'><strong><span style='font-size:15px;line-height:  140%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <?php $i++; ?>
    </tbody>
</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian&nbsp;&nbsp;&nbsp; surat ini &nbsp;&nbsp;&nbsp;kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p><br>

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

$tgl1 = date('d-m-Y');
$array = explode("-", $tgl1);

//$tgl = $array[0];
$bln = $array[1];
//$thn = $array[2];

$tanggal1 = date('d');
$tahun = date('Y');
$bulan = substr($tgl1, 5, 2);
// $bulan = substr($tglpinjam, 5, 2);
$tanggal = substr($tgl1, 8, 2);

$nbulan = bulans($bln);

foreach ($role_id as $r);

//$role_id = $this->session->userdata('role_id');
$role_kaprodi = $r->id_approval;
$id_pordi = $this->session->userdata('id_prodi');

$prodi_cek = $this->uri->segment(4);



$hasil2 = $this->db->query("SELECT * FROM user_role a,user b,tb_personel_ftk c WHERE a.id=b.role_id AND b.username=c.no_induk AND c.id_prodi='$prodi_cek' AND b.role_id='$role_kaprodi'")->result();
foreach ($hasil2 as $hsl2);

$kalab = $this->db->query("SELECT * FROM user a, tb_personel_ftk b WHERE a.username=b.no_induk AND a.role_id=2")->result();
foreach ($kalab as $kl);
//echo 'Role' . $role_kaprodi . "<br>";
//echo 'Prodi' . $id_pordi;
?>
<p style="margin-left:380px;">Singaraja, <?php echo $tanggal1 . ' ' . $nbulan . ' ' . $tahun ?></p>

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
            <td>Korprodi <?php echo $ar->nama_prodi ?></td>
        </tr>
        <tr>
            <td><br><br></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <u><?php echo $kl->nama; ?></u><br>
                NIP. <?php echo $kl->username; ?>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <u><?php echo $hsl2->nama; ?></u><br>
                NIP. Koorprodi<?php echo $hsl2->no_induk; ?>
            </td>
        </tr>
    </tbody>

</table>