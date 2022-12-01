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
                                                <th>Nama Deposan</th>
                                                <th>NIK</th>
                                                <th>Waktu Deposito</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($get_all as $data) {
                                                // Action
                                                $edit = '<a href="#" id="editDeposito" class="btn btn-sm btn-warning" title="Edit Data" data-toggle="modal" data-target="#exampleModal" data-id_deposito="' . $data->id_deposito . '" data-name="' . $data->name . '" data-nik="' . $data->nik . '" data-address="' . $data->address . '" data-email="' . $data->email . '" data-phone="' . $data->phone . '" data-total_deposito="' . $data->total_deposito . '" data-jangka_waktu="' . $data->jangka_waktu . '" data-waktu_deposito="' . $data->waktu_deposito . '" data-jatuh_tempo="' . $data->jatuh_tempo . '" data-bagi_hasil="' . $data->bagi_hasil . '"><i class="fas fa-pen"></i></a>';
                                                $delete = '<a href="#" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>';
                                                $detail = '<a href="#" class="btn btn-sm btn-info" title="Detail Data"><i class="fas fa-info-circle"></i></a>';
                                            ?>
                                                <tr>
                                                    <td><?php echo $data->name ?></td>
                                                    <td><?php echo $data->nik ?></td>
                                                    <td><?php echo datetime_indo3($data->waktu_deposito) ?></td>
                                                    <td><?php echo datetime_indo3($data->jatuh_tempo) ?></td>
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 700px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $page_title ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php echo form_open($action) ?>
                                <div class="modal-body">
                                    <!-- Content -->
                                    <div class="form-group">
                                        <label>Nama Deposan</label>
                                        <?php echo form_input($name) ?>
                                        <small id="emailHelp" class="form-text text-muted">Isikan nama lengkap Deposan.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <?php echo form_input($nik) ?>
                                        <small id="emailHelp" class="form-text text-muted">Isikan nomor induk kependudukan sesuai KTP.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <?php echo form_input($address) ?>
                                        <small id="emailHelp" class="form-text text-muted">Isikan alamat lengkap sesuai KTP.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <?php echo form_input($email) ?>
                                    </div>
                                    <div class="form-group">
                                        <label>No HP/Telephone/WhatsApp</label>
                                        <div class="input-group mb-3">
                                            <?php echo form_input($phone) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Deposito</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RP</span>
                                            </div>
                                            <?php echo form_input($total_deposito) ?>
                                            <div class="input-group-append">
                                                <span class="input-group-text">,00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateRangePicker">Jangka Waktu Deposito</label>
                                        <div class="input-daterange input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <?php echo form_input($waktu_deposito) ?>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">sampai dengan</span>
                                            </div>
                                            <?php echo form_input($jatuh_tempo) ?>
                                        </div>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <?php echo form_input($id_deposito) ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
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
            $(document).on('click', '#editDeposito', function() {
                const id_deposito = $(this).data('id_deposito');
                const name = $(this).data('name');
                const nik = $(this).data('nik');
                const address = $(this).data('address');
                const email = $(this).data('email');
                const phone = $(this).data('phone');
                const total_deposito = $(this).data('total_deposito');
                const jangka_waktu = $(this).data('jangka_waktu');
                const waktu_deposito = $(this).data('waktu_deposito');
                const jatuh_tempo = $(this).data('jatuh_tempo');
                const bagi_hasil = $(this).data('bagi_hasil');
                $('#id_deposito').val(id_deposito);
                $('#name').val(name);
                $('#nik').val(nik);
                $('#address').val(address);
                $('#email').val(email);
                $('#phone').val(phone);
                $('#total_deposito').val(total_deposito);
                $('#jangka_waktu').val(jangka_waktu);
                $('#waktu_deposito').val(waktu_deposito);
                $('#jatuh_tempo').val(jatuh_tempo);
                $('#bagi_hasil').val(bagi_hasil);
            })
        });
    </script>
</body>

</html>