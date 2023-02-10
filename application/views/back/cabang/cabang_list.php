<!-- Meta -->
<?php $this->load->view('back/template/meta'); ?>

<!-- DataTables -->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<!-- DataTables -->

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
                                                <th>Cabang</th>
                                                <?php if (is_grandadmin()) { ?>
                                                <th>Instansi</th>
                                                <?php } ?>
                                                <th style="width: 100px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($get_all as $data) {
                                                // Action
                                                $edit = '<a href="#" id="editCabang" class="btn btn-sm btn-warning" title="Edit Data" data-toggle="modal" data-target="#modalEditCabang" data-id_cabang="' . $data->id_cabang . '" data-cabang_name="' . $data->cabang_name . '" data-instansi_id="' . $data->instansi_id . '"><i class="fas fa-pen"></i></a>';
                                                $delete = '<a href="' . base_url('admin/cabang/delete/' . $data->id_cabang) . '" id="delete-button" class="btn btn-sm btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>';
                                            ?>
                                                <tr>
                                                    <td><?php echo $data->cabang_name ?></td>
                                                    <?php if (is_grandadmin()) { ?>
                                                        <td><?php echo $data->instansi_name ?></td>
                                                    <?php } ?>
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
                    <?php $this->load->view('back/cabang/modal_edit'); ?>
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                ordering: false
            }); // ID From dataTable

            $(document).on('click', '#editCabang', function() {
                const id_cabang = $(this).data('id_cabang');
                const cabang_name = $(this).data('cabang_name');
                const instansi_id = $(this).data('instansi_id');
                $('#id_cabang').val(id_cabang);
                $('#cabang_name').val(cabang_name);
                $('#instansi_id').val(instansi_id);
            });
        });
    </script>
</body>

</html>