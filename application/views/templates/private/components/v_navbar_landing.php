<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
	<a href="<?= base_url() ?>" class="navbar-brand">
		<i class="fa fa-info-circle brand-logo"></i>
		<span class="brand-text font-weight-light"><?= $this->session->userdata('AppInfo') ?></span>
	</a>

	<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Right navbar links -->
	<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
		<?php if ($this->session->userdata('parents')) : ?>
			<li class="nav-item">
				<a id="updateDB" class="nav-link" href="#" role="button"><i class="fa fa-database"></i> Update</a>
			</li>
		<?php endif ?>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('dashboard/landing/logout') ?>" role="button"><i class="fa fa-sign-out-alt"></i> Keluar</a>
		</li>
	</ul>
</nav>