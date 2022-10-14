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
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info">
								<h4><i class="icon fa fa-info-circle"></i> <span id="Greetings"></span> <?= $this->session->userdata('nama') ?></h4>
								Sedikit <span class="text-warning">informasi</span> untuk mengakses fitur <b><?= $this->session->userdata('AppInfo') ?>.</b> Silahkan klik tombol <b>Akses Fitur</b> untuk mengakses modul!. Untuk keluar dari aplikasi, silahkan klik <a href="<?= base_url('dashboard/administrator/logout') ?>">tautan ini</a>.
							</div>
						</div>
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body row justify-content-center">
									<?php foreach ($this->m->get_level() as $level) : ?>
										<?php if (array_search($this->session->userdata('id'), explode(",", $level->level_show_landing))) : ?>
											<div class="col-lg-3 col-6">
												<a href="<?= base_url('dashboard/landing/akses/' . $level->level_id . '?url=' . $level->level_url) ?>" id="setup" data="<?= $level->level_id ?>" class="text-light">
													<div class="small-box p-2" style="background-color: <?= $level->level_background ?>">
														<div class="inner text-center">
															<h5 class="pt-4 pb-4" style="text-transform: uppercase;"><?= $level->level_nama ?></h5>
														</div>
														<div class="icon">
															<i class="fa <?= $level->level_icon ?>"></i>
														</div>
													</div>
												</a>
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
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