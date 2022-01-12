<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />



<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>



<script type="text/javascript">
    //initSample();

    /*$('#example').DataTable({
        "scrollX": true
    });*/

    // $('table.display').DataTable({ "scrollX": true});

    $('table.display').DataTable({
        "scrollY": 200,
        "scrollX": true
    });




    $(document).ready(function() {


        $('.evid').click(function() {
            $('#Modalku').modal();
            var idp = $(this).attr('idp')
            $('#id_peminjaman').val(idp)
        })

        $('.evid_k').click(function() {
            $('#Modalkemb').modal();
            var idp = $(this).attr('idp')
            $('#id_peminjaman_k').val(idp)
        })


        $('.laporan').click(function() {
            $('#Modalpr').modal();
            var idp = $(this).attr('idp')
            $('#id_peminjaman_lp').val(idp)
        })

        /*$('.approve_kmbl_kprd').click(function() {
            $('#ModalAppKprd').modal();
            var idp = $(this).attr('idp')
            $('#id_peminjaman_lp').val(idp)
        })*/


        $('.prev').click(function() {
            $('#ModalPrev').modal()
            var first = $(this).attr('idp')
            var pecah1 = first.split("-")
            var pecah2 = pecah1[0]
            var pecah3 = pecah1[1]
            //var last = $(this).attr('dt');
            $('#id_peminjamans').val(pecah3)
            $('#evidence').val(pecah2)
            //html = '<embed type="application/pdf src=<?php echo base_url(); ?>/bap/'+idp+' width=600 height=400></embed>';
            html = "<embed type=application/pdf src=<?php echo base_url(); ?>bap/" + pecah2 + " width=700 height=400></embed>";
            $('#view_pdf').html(html)
        })

        $('.prev_lporan').click(function() {
            $('#ModalPrevLporan').modal()
            var laps = $(this).attr('idps')
            var idpnjm = $(this).attr('dt')
            $('#id_peminjaman_kmbl').val(idpnjm)

            html = "<embed type=application/pdf src=<?php echo base_url(); ?>laporan/" + laps + " width=700 height=400></embed>";
            $('#view_pdfs').html(html)
        })


        $('.approve').click(function() {
            $('#ModalApprove').modal()
            var idp = $(this).attr('idp')
            $('#id_peminjaman_app').val(idp)
        })

        $('.rev').click(function() {
            $('#ModalRev').modal()
            var idr = $(this).attr('idr')
            $('#id_peminjaman_rev').val(idr)
        })

        $('.stts').click(function() {
            $('#StatusPinjam').modal()

            var ids = $(this).attr('ids')
            $('#id_status').val(ids)

            // var revkp = $(this).attr('revkp')
            // $('#r_koorprodi').val(revkp)

            var revl = $(this).attr('revl')
            $('#r_laboran').val(revl)


        })


        $('.revlb').click(function() {
            $('#ModalRevlab').modal()
            var idrev = $(this).attr('idrev')
            //$('#id_peminjaman_rev').val(idr)
            html = '<a href="#" class="badge badge-primary" style="background-color:orange;">' + idrev + '</a>';
            $('#view_rev').html(html)

        })

        $('.revkpd').click(function() {
            $('#ModalRevKord').modal()
            var idapv = $(this).attr('idapv')
            $('#id_peminjaman_kprd').val(idapv)
        })

        $('.viewrevkprd').click(function() {
            $('#ModalViewKprd').modal()
            var idvrkprd = $(this).attr('idvrkprd')
            //$('#id_peminjaman_rev').val(idr)
            html = '<a href="#" class="badge badge-primary" style="background-color:orange;">' + idvrkprd + '</a>';
            $('#view_rev_kprd').html(html)
        })


        $('.kmbl').click(function() {
            $('#ModalKmbl').modal();
            var idk = $(this).attr('idk');
            var idk1 = $(this).attr('idk1');
            var idk2 = $(this).attr('idk2');

            $('#id_pinjam').val(idk);
            $('#nama_aset').val(idk1);
            $('#jumlah_aset').val(idk2);

        })

        $('.sdhaprvpnjm').click(function() {
            $('#ModalAprPnj').modal();
        })

        $('.sdhaprv').click(function() {
            $('#ModalApr').modal();
        })

        $('.approve_kmbl').click(function() {
            $('#ModalAppKmbl').modal();
            var idtkb = $(this).attr('idtkb')
            $('#id_peminjaman_kmbli').val(idtkb)
        })

        $('.approve_kmbl_kprd').click(function() {
            $('#ModalAppKprd').modal();
            //var jmlh = $(this).attr('jmlh')
        })



        $('#kategori').change(function() {

            var id = $(this).val();
            //alert(id);
            $.ajax({
                url: "<?php echo base_url(); ?>kategori/get_lokasi",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    // alert('sukses');
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_lokasi + '>' + data[i].nama_lab + '</option>';
                    }
                    $('#subkategori').html(html);
                }
            });
        });




        var sample_data = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?php echo base_url(); ?>mahasiswa/fetch',
            remote: {
                url: '<?php echo base_url(); ?>mahasiswa/fetch/%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('#prefetch .typeahead').typeahead(null, {
            nama: 'sample_data',
            display: 'nama_barang',
            source: sample_data,
            limit: 10,
            templates: {
                suggestion: Handlebars.compile('<div class="row"><div class="col-md-6">{{nama_barang}}</div></div>')
            }
        });

    });



    $(document).ready(function() {

        var sample_data = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?php echo base_url(); ?>mahasiswa/fetchR',
            remote: {
                url: '<?php echo base_url(); ?>mahasiswa/fetchR/%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('#prefetchR .typeahead').typeahead(null, {
            nama: 'sample_data',
            display: 'nama_lab',
            source: sample_data,
            limit: 10,
            templates: {
                suggestion: Handlebars.compile('<div class="row"><div class="col-md-6">{{nama_lab}}</div></div>')
            }
        });

    });

    $("#lokasi").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_lokasi = $("#lokasi").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/laboran/get_aset",
            method: "POST",
            data: {
                id_lokasi: id_lokasi
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_aset + '>' + data[i].nama_barang + '</option>';
                }
                $('#aset').html(html);

            }
        });
    });

    $("#prodibrs").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_prodi = $("#prodibrs").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/LaboranBR/get_lokasi",
            method: "POST",
            data: {
                id_prodi: id_prodi
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_lokasi + '>' + data[i].nama_lab + '</option>';
                }
                $('#lokasibrs').html(html);

            }
        });
    });

    $("#prodiaset").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_prodi = $("#prodiaset").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/admin/get_lokasi_aset",
            method: "POST",
            data: {
                id_prodi: id_prodi
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_lokasi + '>' + data[i].nama_lab + '</option>';
                }
                $('#labaset').html(html);

            }
        });
    });
</script>



</body>

</html>