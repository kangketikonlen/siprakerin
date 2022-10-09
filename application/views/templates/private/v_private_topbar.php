<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($Components['header']); ?>

<body class="hold-transition dark-mode text-sm layout-top-nav" style="height: auto;" cz-shortcut-listen="true">
	<div id="overlay">
		<div class="cv-spinner">
			<img src="<?= base_url('assets/images/spinner/loading.gif') ?>">
		</div>
	</div>
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view($Components['navbar']); ?>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<?php $this->load->view($Components['content']); ?>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<?php $this->load->view($Components['footer']); ?>
	</div>
	<!-- ./wrapper -->
</body>

</html>