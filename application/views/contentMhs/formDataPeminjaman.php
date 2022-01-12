<!-- Begin Page Content -->
<div class="container-fluid">

    <script src="<?php echo base_url('assets/ck_assets/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('assets/ck_assets/sample/js/sample.js'); ?>"></script>
    <!-- Page Heading -->
    <div class="row ml-5">
        <h1 class="h3 mb-4 text-gray-800"><b>Form Data Peminjaman</b></h1>
        <div class="card col-lg-11">
            <div class="card-header">
                <b><?= $title; ?></b>
            </div>
            <div class="card-body">
                <section class="content">
                    <form action="<?php echo base_url() . 'mahasiswa/insertPeminjamanBarang'; ?>" method="post">

                        <div class="form-group">
                            <input type="hidden" name="id_beritaacr" id="id_beritaacr" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="">NIP/NIM</label>
                            <input type="text" name="nip_nim" id="nip_nim" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Peminjaman</label>
                            <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pengembalian</label>
                            <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Cari Aset Barang yang Ingin Dipinjam</label>

                            <div id="prefetch">
                                <input type="text" style="font-size: medium;" name="search_box" id="search_box" class="form-control input-lg typeahead" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keperluan</label>
                            <textarea id="editor" name="editor"></textarea>
                        </div>



                        <input type="submit" class="btn btn-primary" value="Submit" />

                        <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                        <br>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->