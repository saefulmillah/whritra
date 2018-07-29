<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ritra Warehouse</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/template/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/template/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/template/vendors/css/vendor.bundle.addons.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/template/vendors/iconfonts/font-awesome/css/font-awesome.min.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <?php 
  if (count($css) > 0) {
    for ($i=0; $i < count($css); $i++) { 
       echo '<link rel="stylesheet" href="'.base_url('assets/'.$css[$i]).'">';
     } 
  } ?>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/template/css/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/template/images/favicon.png')?>" />
</head>