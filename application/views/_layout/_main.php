<?php echo $header ?>
<body>
	<div class="container-scroller">
		<?php echo $navbar ?>
		<div class="container-fluid page-body-wrapper">
			<?php echo $sidebar ?>
			<div class="main-panel">
		        <div class="content-wrapper">
		        	<?php echo $index ?>
		        </div>
		    </div>
		</div>
	</div>
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
	<?php if ($js != '') : ?>

	<script type="text/javascript" src="<?=base_url('assets/').$js?>"></script>

	<?php endif;?>
</body>
</html>