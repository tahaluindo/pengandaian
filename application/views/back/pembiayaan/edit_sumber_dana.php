<!-- Meta -->
<?php $this->load->view('back/template/meta'); ?>

<!-- DataTables -->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<!-- DataTables -->
<!-- Bootstrap DatePicker -->
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<!-- Bootstrap DatePicker -->
<!-- Bootstrap Touchspin -->
<link href="<?php echo base_url('assets/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') ?>" rel="stylesheet">
<!-- Bootstrap Touchspin -->
</head>
<!-- Meta -->

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('back/template/sidebar'); ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?php $this->load->view('back/template/navbar'); ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title ?></h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title ?></li>
                        </ol>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                            } ?>

                            <div class="alert alert-info" role="alert">
                                No Anggota : <b><?php echo $pembiayaan->no_pinjaman ?></b><br>
                                Nama Anggota : <b><?php echo $pembiayaan->name ?></b><br>
                                <hr>
                                Jumlah Pinjaman Anggota : <b>Rp <?php echo number_format($pembiayaan->jml_pinjaman, 0, ',', '.') ?></b>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_open($action) ?>
                            <div class="form-group">
                                <label>Pilih Sumber Dana</label>
                                <?php echo form_dropdown('', $sumber_dana_value, '', $status_sumber_dana) ?>
                            </div>

                            <div id="showSumberDana"></div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <!-- Row -->

                    <!-- Modal Persentase -->
                    <?php $this->load->view('back/pembiayaan/modal_persentase'); ?>
                    <!-- Modal Persentase -->

                    <!-- Modal Logout -->
                    <?php $this->load->view('back/template/modal_logout'); ?>
                    <!-- Modal Logout -->
                </div>
                <!--Container Fluid-->
            </div>
            <!-- Footer - Copyright -->
            <?php $this->load->view('back/template/footer_copyright'); ?>
            <!-- Footer - Copyright -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scroll to top -->

    <!-- Footer -->
    <?php $this->load->view('back/template/footer'); ?>
    <!-- Footer -->
    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <!-- Datatables -->
    <!-- Bootstrap Datepicker -->
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Bootstrap Datepicker -->
    <!-- maskMoney -->
    <script src="<?php echo base_url('assets/') ?>maskMoney/jquery.maskMoney.min.js"></script>
    <!-- maskMoney -->
    <!-- Bootstrap Touchspin -->
    <script src="<?php echo base_url('assets/') ?>bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <!-- Bootstrap Touchspin -->

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable({
                ordering: false,
            }); // ID From dataTable with Hover

            $(document).on('click', '#persentaseDeposito', function() {
                const id_deposito = $(this).data('id_deposito');
                $('#id_deposito').val(id_deposito);
            });
        });

        function tampilFormSumberDana() {
            sumber_dana = document.getElementById("status_sumber_dana").value;
            id_pembiayaan = <?php echo $pembiayaan->id_pembiayaan ?>;

            $.ajax({
                url: "<?php echo base_url(); ?>admin/pembiayaan/tampil_form_sumber_dana/" + sumber_dana + "/" + id_pembiayaan,
                beforeSend: function() {
                    $("#showSumberDana").html('<center><h1><i class="fa fa-spin fa-spinner" /></h1></center>');
                },
                success: function(response) {
                    $("#showSumberDana").html(response);
                },
                dataType: "html"
            });
            return false;
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        $('#persentase_deposito').on('keyup', function() {
            persentase_deposito = document.getElementById("persentase_deposito").value;

            $.ajax({
                url: "<?php echo base_url('admin/pembiayaan/konversi_nominal/') ?>" + persentase_deposito,
                success: function(response) {
                    var myObj = JSON.parse(response);

                    $('#konversi_nominal').val(formatRupiah(myObj.hasil_konversi));
                }
            });
        });
    </script>
</body>

</html>