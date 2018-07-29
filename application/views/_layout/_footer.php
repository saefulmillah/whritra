<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<!-- plugins:js -->
<script src="<?=base_url('assets/template/vendors/js/vendor.bundle.base.js')?>"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?=base_url('assets/template/js/off-canvas.js')?>"></script>
<script src="<?=base_url('assets/template/js/misc.js')?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?=base_url('assets/template/js/dashboard.js')?>"></script>
<?php 
  if (count($js) > 0) {
    for ($i=0; $i < count($js); $i++) { 
       echo '<script type="text/javascript" src="'.base_url('assets/').$js[$i].'"></script>';
     } 
  } ?>