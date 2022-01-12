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
<?php

foreach ($dataAset as $p);
foreach ($dataAset as $l);

?>
<center>
    <p style="font-size: 20;"><b>DAFTAR INVENTARIS LAB</b></p>
</center><br>
<table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td>LEMBAGA</td>
            <td>:</td>
            <td>Universitas Pendidikan Ganesha</td>
        </tr>
        <tr>
            <td>UNIT KERJA</td>
            <td>:</td>
            <td>Laboratorium <?= $p->nama_prodi ?> (<?= $l->nama_lab ?>)</td>
        </tr>
        <tr>
            <td>TAHUN</td>
            <td>:</td>
            <td><?php echo date('Y'); ?></td>
        </tr>
    </tbody>

</table>
<br>

<table align="center" width="80%" border="1" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($dataAset as $as) : ?>
            <tr>
                <td scope="row" align="center"><?= $i; ?></td>
                <td><?= $as->nama_barang; ?></td>
                <td><?= $as->spesifikasi; ?></td>
                <td align="center"><?= $as->jumlah; ?></td>
                <td align="center"><?= $as->satuan; ?></td>
                <td align="center"><?= $as->keterangan; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>

</table>