<!-- Meta -->
<?php $this->load->view('back/template/meta'); ?>

<!-- DataTables -->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<!-- DataTables -->
<!-- Bootstrap DatePicker -->
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<!-- Bootstrap DatePicker -->
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

                    <!--Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                            } ?>
                            <!-- Content -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Jumlah Pinjaman</th>
                                                <th>Dibuat Oleh</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($get_all as $data) {
                                                if ($data->sistem_pembayaran_sewa == 1) {
                                                    $sistem_pembayaran_sewa = 'Bulanan';
                                                } elseif ($data->sistem_pembayaran_sewa == 2) {
                                                    $sistem_pembayaran_sewa = 'Jatuh Tempo';
                                                }

                                                if ($data->sumber_dana == 1) {
                                                    $sumber_dana = 'Tabungan';
                                                } elseif ($data->sumber_dana == 2) {
                                                    $sumber_dana = 'Deposito';
                                                } elseif ($data->sumber_dana == 3) {
                                                    $sumber_dana = 'Tabungan dan Deposito';
                                                }

                                                // Action
                                                $edit = '<a href="#" id="editPembiayaan" class="btn btn-sm btn-warning" title="Edit Data" data-toggle="modal" data-target="#exampleModal" data-id_pembiayaan="' . $data->id_pembiayaan . '" data-name="' . $data->name . '" data-nik="' . $data->nik . '" data-address="' . $data->address . '" data-email="' . $data->email . '" data-phone="' . $data->phone . '" data-jml_pinjaman="' . $data->jml_pinjaman . '" data-jangka_waktu_pinjam="' . $data->jangka_waktu_pinjam . '" data-jenis_barang_gadai="' . $data->jenis_barang_gadai . '" data-berat_barang_gadai="' . $data->berat_barang_gadai . '" data-waktu_gadai="' . $data->waktu_gadai . '" data-jatuh_tempo_gadai="' . $data->jatuh_tempo_gadai . '" data-sistem_pembayaran_sewa="' . $data->sistem_pembayaran_sewa . '" data-sumber_dana="' . $data->sumber_dana . '"><i class="fas fa-pen"></i></a>';
                                                $delete = '<a href="' . base_url('admin/pembiayaan/delete/' . $data->id_pembiayaan) . '" id="delete-button" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>';
                                                $detail = '<a href="#" id="detailPembiayaan" class="btn btn-sm btn-info" title="Detail Data" data-toggle="modal" data-target="#detailModal" data-name="' . $data->name . '" data-nik="' . $data->nik . '" data-address="' . $data->address . '" data-email="' . $data->email . '" data-phone="' . $data->phone . '" data-jml_pinjaman="' . number_format($data->jml_pinjaman, 2, ',', '.') . '" data-jangka_waktu_pinjam="' . $data->jangka_waktu_pinjam . '" data-jenis_barang_gadai="' . $data->jenis_barang_gadai . '" data-berat_barang_gadai="' . $data->berat_barang_gadai . '" data-waktu_gadai="' . date_indonesian_only($data->waktu_gadai) . '" data-jatuh_tempo_gadai="' . date_indonesian_only($data->jatuh_tempo_gadai) . '" data-jangka_waktu_gadai="' . $data->jangka_waktu_gadai . '" data-sewa_tempat_perbulan="' . number_format($data->sewa_tempat_perbulan, 2, ',', '.') . '" data-total_biaya_sewa="' . number_format($data->total_biaya_sewa, 2, ',', '.') . '" data-sistem_pembayaran_sewa="' . $sistem_pembayaran_sewa . '" data-sumber_dana="' . $sumber_dana . '"><i class="fas fa-info-circle"></i></a>';
                                            ?>
                                                <tr>
                                                    <td><?php echo $data->name ?></td>
                                                    <td><?php echo $data->nik ?></td>
                                                    <td>Rp. <?php echo number_format($data->jml_pinjaman, 0, ',', '.') ?></td>
                                                    <td><?php echo $data->created_by ?></td>
                                                    <td><?php echo $detail ?> <?php echo $edit ?> <?php echo $delete ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Content -->
                        </div>
                    </div>
                    <!--Row-->

                    <!-- Modal Logout -->
                    <?php $this->load->view('back/template/modal_logout'); ?>
                    <!-- Modal Logout -->

                    <!-- Modal Edit -->
                    <?php //$this->load->view('back/pembiayaan/modal_edit');
                    ?>
                    <!-- Modal Edit -->

                    <!-- Modal detail -->
                    <?php $this->load->view('back/pembiayaan/modal_detail'); ?>
                    <!-- Modal detail -->
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

    <script>
        $(document).ready(function() {
            $('#total_deposito').maskMoney({
                thousands: '.',
                decimal: ',',
                precision: 0
            });
        });

        $(document).ready(function() {
            $('#waktu_deposito').datepicker({
                startView: 2,
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#jatuh_tempo').datepicker({
                startView: 2,
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

        $(document).ready(function() {
            $(document).on('click', '#editPembiayaan', function() {
                const id_pembiayaan = $(this).data('id_pembiayaan');
                const name = $(this).data('name');
                const nik = $(this).data('nik');
                const address = $(this).data('address');
                const email = $(this).data('email');
                const phone = $(this).data('phone');
                const jml_pinjaman = $(this).data('jml_pinjaman');
                const jangka_waktu_pinjam = $(this).data('jangka_waktu_pinjam');
                const jenis_barang_gadai = $(this).data('jenis_barang_gadai');
                const berat_barang_gadai = $(this).data('berat_barang_gadai');
                const waktu_gadai = $(this).data('waktu_gadai');
                const jatuh_tempo_gadai = $(this).data('jatuh_tempo_gadai');
                const sistem_pembayaran_sewa = $(this).data('sistem_pembayaran_sewa');
                const sumber_dana = $(this).data('sumber_dana');
                $('#id_pembiayaan').val(id_pembiayaan);
                $('#name').val(name);
                $('#nik').val(nik);
                $('#address').val(address);
                $('#email').val(email);
                $('#phone').val(phone);
                $('#jml_pinjaman').val(jml_pinjaman);
                $('#jangka_waktu_pinjam').val(jangka_waktu_pinjam);
                $('#jenis_barang_gadai').val(jenis_barang_gadai);
                $('#berat_barang_gadai').val(berat_barang_gadai);
                $('#waktu_gadai').val(waktu_gadai);
                $('#jatuh_tempo_gadai').val(jatuh_tempo_gadai);
                $('#sistem_pembayaran_sewa').val(sistem_pembayaran_sewa);
                $('#sumber_dana').val(sumber_dana);
            });

            $(document).on('click', '#detailPembiayaan', function() {
                const name = $(this).data('name');
                const nik = $(this).data('nik');
                const address = $(this).data('address');
                const email = $(this).data('email');
                const phone = $(this).data('phone');
                const jml_pinjaman = $(this).data('jml_pinjaman');
                const jangka_waktu_pinjam = $(this).data('jangka_waktu_pinjam');
                const jenis_barang_gadai = $(this).data('jenis_barang_gadai');
                const berat_barang_gadai = $(this).data('berat_barang_gadai');
                const waktu_gadai = $(this).data('waktu_gadai');
                const jatuh_tempo_gadai = $(this).data('jatuh_tempo_gadai');
                const jangka_waktu_gadai = $(this).data('jangka_waktu_gadai');
                const sewa_tempat_perbulan = $(this).data('sewa_tempat_perbulan');
                const total_biaya_sewa = $(this).data('total_biaya_sewa');
                const sistem_pembayaran_sewa = $(this).data('sistem_pembayaran_sewa');
                const sumber_dana = $(this).data('sumber_dana');
                $('.name').text(name);
                $('.nik').text(nik);
                $('.address').text(address);
                $('.email').text(email);
                $('.phone').text(phone);
                $('.jml_pinjaman').text(jml_pinjaman);
                $('.jangka_waktu_pinjam').text(jangka_waktu_pinjam);
                $('.jenis_barang_gadai').text(jenis_barang_gadai);
                $('.berat_barang_gadai').text(berat_barang_gadai);
                $('.waktu_gadai').text(waktu_gadai);
                $('.jatuh_tempo_gadai').text(jatuh_tempo_gadai);
                $('.jangka_waktu_gadai').text(jangka_waktu_gadai);
                $('.sewa_tempat_perbulan').text(sewa_tempat_perbulan);
                $('.total_biaya_sewa').text(total_biaya_sewa);
                $('.sistem_pembayaran_sewa').text(sistem_pembayaran_sewa);
                $('.sumber_dana').text(sumber_dana);
            })
        });
    </script>
</body>

</html>