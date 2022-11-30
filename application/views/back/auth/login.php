<!-- Meta -->
<?php $this->load->view('back/template/meta'); ?>
<style>
    .bg {
        /* The image used */
        background-image: url("../assets/images/bg_arsip.jpeg");

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<script src="<?php echo base_url('assets/jquery2/') ?>jquery.js"></script>
<script type="text/javascript">
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#customCheck').click(function() {
            if ($j(this).is(':checked')) {
                $j('#password').attr('type', 'text');
            } else {
                $j('#password').attr('type', 'password');
            }
        });
    });
</script>
</head>
<!-- Meta -->

<body class="bg-gradient-login bg">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card shadow-sm my-3">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <?php if ($this->session->flashdata('message')) {
                                        echo $this->session->flashdata('message');
                                    } ?>
                                    <div class="text-center">
                                        <div class="login-logo">
                                            <img src="<?php echo base_url('assets/images/company/') . $company_data->company_photo ?>" width="200px" alt="company-logo">
                                        </div>
                                        <!-- <h1 class="h1 text-gray-900 mb-4">Login</h1> -->
                                        <h6 class="h7 text-gray-600 mb-4">Silahkan Isi Username dan Password Anda untuk Masuk ke Sistem</h6>
                                    </div>
                                    <?php echo form_open($action, array('class' => 'user')) ?>
                                    <div class="form-group">
                                        <?php echo form_input($username) ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_password($password) ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Tampilkan Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <?php echo form_close() ?>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('back/template/footer'); ?>
</body>

</html>