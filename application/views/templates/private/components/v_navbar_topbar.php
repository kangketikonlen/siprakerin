<nav class="main-header navbar navbar-expand-md navbar-dark navbar-secondary text-sm">
	<div class="container">
		<span class="navbar-brand text-sm">
			<i class="fa fa-info-circle brand-logo"></i>
			<span class="brand-text font-weight-light"><?= $this->session->userdata('AppInfo') ?></span>
		</span>
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
				<span class="nav-link"><i class="fa fa-user-circle"></i> <?= $this->session->userdata('nama') ?></span>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url($this->session->userdata('UrlDash') . '/logout') ?>" role="button"><i class="fa fa-sign-out-alt"></i> Keluar</a>
			</li>
		</ul>
	</div>
</nav>