<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/images/company/eduarsip20210116163119_thumb.png') ?>" rel="icon">
  <title><?php echo $page_title . ' | ' . $company_data->company_name ?></title>
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/ruang-admin.min.css') ?>" rel="stylesheet">

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