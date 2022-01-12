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
<center>
    <p style="font-size: 20;"><b><?= $title; ?></b></p>
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
            <td>Laboratorium Sistem Informasi</td>
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
            <th>Lokasi</th>
            <th>Nama Barang</th>
            <th>Prodi</th>
            <th>Spesifikasi</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($dataAset as $as) : ?>
            <tr>
                <td scope="row" align="center"><?= $i; ?></td>
                <td><?= $as->nama_lab; ?></td>
                <td><?= $as->nama_barang; ?></td>
                <td><?= $as->nama_prodi; ?></td>
                <td><?= $as->spesifikasi; ?></td>
                <td align="center"><?= $as->jumlah; ?></td>
                <td align="center"><?= $as->satuan; ?></td>
                <td align="center"><?= $as->keterangan; ?></td>
                <td>
                    <center>
                        <?php
                        $img = $as->foto;
                        ?>
                        <?php if ($img == "") { ?>
                            <p class="text-danger">No Image!</p>
                        <?php } else { ?>
                            <img src="<?php echo base_url() . 'assets/media/' . $img; ?>" width="150" height="100" />
                        <?php } ?>
                    </center>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>

</table>