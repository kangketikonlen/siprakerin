<nav class="main-header navbar navbar-expand navbar-dark navbar-secondary text-sm">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<?php if ($this->session->userdata('level_tmp')) : ?>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard/landing/reset_akses') ?>" role="button"><i class="fa fa-home"></i> Landing Page</a>
			</li>
		<?php endif ?>
		<?php if ($this->session->userdata('parents')) : ?>
			<li class="nav-item">
				<a id="updateDB" class="nav-link" href="#" role="button"><i class="fa fa-database"></i> Update</a>
			</li>
		<?php endif ?>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url($this->session->userdata('UrlDash') . '/logout') ?>" role="button"><i class="fa fa-sign-out-alt"></i> Keluar</a>
		</li>
	</ul>
</nav>