<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_aset_Prodi_TE.xls");
?>




<center>
    <p><b><?= $title; ?></b></p>
</center>

<table border="2" cellpadding="5" align="center">
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
                <td scope="row"><?= $i; ?></td>
                <td><?= $as['nama_lab']; ?></td>
                <td><?= $as['nama_barang']; ?></td>
                <td><?= $as['nama_prodi']; ?></td>
                <td><?= $as['spesifikasi']; ?></td>
                <td><?= $as['jumlah']; ?></td>
                <td><?= $as['satuan']; ?></td>
                <td><?= $as['keterangan']; ?></td>
                <td>
                    <center>
                        <?php
                        $img = $as['foto'];
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