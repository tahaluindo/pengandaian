<!-- Meta -->
<?php $this->load->view('back/template/meta'); ?>

<!-- DataTables -->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<!-- DataTables -->
<!-- Bootstrap DatePicker -->
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<!-- Bootstrap DatePicker -->
<style>
    .display {
        display: inline;
    }
</style>
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
                            <?php echo validation_errors() ?>
                            <!-- Content -->
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nama Instansi</th>
                                                <th>Alamat</th>
                                                <th>No Telephone</th>
                                                <th>Logo</th>
                                                <th>Aktif Sampai</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($get_all as $data) {
                                                // Handle Status
                                                if ($data->is_active == 0) {
                                                    $is_active = '<span class="badge badge-danger">Non Aktif</span>';
                                                } elseif ($data->is_active == 1) {
                                                    $is_active = '<span class="badge badge-success">Aktif</span>';
                                                }

                                                // Handle Image
                                                if ($data->instansi_img_thumb) {
                                                    $image = '<img src="' . base_url("assets/images/instansi/" . $data->instansi_img_thumb) . '" width="80px" class="img-circle">';
                                                } else {
                                                    $image = '<img src="' . base_url("assets/images/noimage.jpg") . '" width="80px" class="img-circle">';
                                                }


                                                // Action
                                                $edit = '<a href="#" id="editInstansi" class="btn btn-sm btn-warning" title="Edit Data" data-toggle="modal" data-target="#modalInstansi" data-id_instansi="' . $data->id_instansi . '" data-instansi_name="' . $data->instansi_name . '" data-instansi_address="' . $data->instansi_address . '" data-instansi_phone="' . $data->instansi_phone . '" data-active_date="' . $data->active_date . '" data-instansi_img="' . $data->instansi_img . '"><i class="fas fa-pen"></i></a>';
                                                $delete = '<a href="' . base_url('admin/instansi/delete/' . $data->id_instansi) . '" id="delete-button" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>';
                                            ?>
                                                <tr>
                                                    <td><?php echo $data->instansi_name ?></td>
                                                    <td><?php echo $data->instansi_address ?></td>
                                                    <td><?php echo $data->instansi_phone ?></td>
                                                    <td><?php echo $image ?></td>
                                                    <td style="text-align: center"><?php echo date_indonesian_only($data->active_date) ?></td>
                                                    <td><?php echo $is_active ?></td>
                                                    <td><?php echo $edit ?> <?php echo $delete ?></td>
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
                    <?php $this->load->view('back/deposito/modal_edit'); ?>
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
            $('#dataTable').DataTable({
                ordering: false
            }); // ID From dataTable

            $('#active_date').datepicker({
                startView: 2,
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#editInstansi', function() {
                const id_instansi = $(this).data('id_instansi');
                const instansi_name = $(this).data('instansi_name');
                const instansi_address = $(this).data('instansi_address');
                const instansi_phone = $(this).data('instansi_phone');
                const active_date = $(this).data('active_date');
                const instansi_img = $(this).data('instansi_img');
                $('#id_instansi').val(id_instansi);
                $('#instansi_name').val(instansi_name);
                $('#instansi_address').val(instansi_address);
                $('#instansi_phone').val(instansi_phone);
                $('#active_date').val(active_date);
                $('#instansi_img').val(instansi_img);
            });
        });
    </script>
</body>

</html>