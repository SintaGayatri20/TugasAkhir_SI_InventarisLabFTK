<!-- Begin Page Content -->
<div class="container-fluid">
    <script src="<?php echo base_url('assets/ck_assets/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('assets/ck_assets/sample/js/sample.js'); ?>"></script>

    <!-- Page Heading -->

    <?= $this->session->flashdata('message'); ?>

    <div class="alert alert-block alert-info fade in">
        <p></p>
        <h4><i class="far fa-check-circle"></i> Petunjuk </h4>
        <ol>
            <li>Sebelum mencetak berita acara peminjaman mengajukan permohonan kepada Ketua Lab FTK dengan Tembusan ke WD II dan Bagian Perlengkapan FTK untuk keperluan peminjaman alat/ruangan Laboratorium.</li>
            <li>Apabila permohonan/proposal tersebut disetujui oleh WD II , Ketua Laboratorium berkoordinasi terkait peminjaman alat/ruangan Laboratorium.</li>
            <li>Peminjam alat/ruangan Laboratorium dapat mengisi data berita acara peminjaman.</li>
            <li>BARU. Peminjam dapat mengunakan alat/ruangan Laboratorium.</li>
        </ol>
        <p></p>
    </div>


    <div class="row">
        <div class="col-sm-5">

            <form action="#" method="post">
                <label for=""><b>Pilih Berita Acara Peminjaman</b></label>
                <div class="form-group">
                    <select id="select_id" name="actors" class="form-control">
                        <option value="">-- Pilih Berita Acara Peminjaman --</option>
                        <option value="">Berita Acara Peminjaman Barang</option>
                        <option value="">Berita Acara Peminjaman Ruangan</option>

                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Mengisi Data Berita Acara" />

            </form>
        </div>
        <div class="col-sm-7">
            <div class="clearfix">
                <label for="">
                    <h4><b>Penjelasan</b></h4>
                </label>
                <p>Karena dibutuhkannya data yang akurat untuk keperluan inventaris Laboratorium, maka Dosen/Mahasiswa diharapkan mengisi data Berita Acara Peminjaman dengan baik dan benar.
                    Apabila data yang kami minta sudah terisi dengan lengkap maka Surat Berita Peminjaman Barang/Ruangan dapat langsung dicetak. Terima Kasih</p>
            </div>
        </div>
    </div>



</div>

<!-- Content Row -->


</div>
<!-- End of Main Content -->