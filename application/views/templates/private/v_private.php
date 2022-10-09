<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($Components['header']); ?>

<body class="hold-transition sidebar-mini-xs dark-mode text-sm layout-fixed" style="height: auto;" cz-shortcut-listen="true">
	<div id="overlay">
		<div class="cv-spinner">
			<img src="<?= base_url('assets/images/spinner/loading.gif') ?>">
		</div>
	</div>
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view($Components['navbar']); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view($Components['sidebar']); ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><?= $Title ?></h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<?php foreach ($Breadcrumb as $b) : ?>
									<li class="breadcrumb-item"><?= $b ?></li>
								<?php endforeach ?>
								<li class="breadcrumb-item active"><?= $Title ?></li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

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
	<?php $this->load->view($Components['javascript']); ?>
</body>

</html>