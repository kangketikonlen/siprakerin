<div class="row">
	<div class="col col-lg-12 mt-3">
		<div class="jumbotron py-3 text-center bg-transparent">
			<h1>Hi, <?= $this->session->userdata('nama') ?> <i class="far fa-smile-wink"></i></h1>
			<p class="lead">Silahkan jelajahi dengan menggunakan tombol navigasi di samping atau tekan tombol <i class=" fa fa-bars"></i> diatas untuk mengakses fitur.</p>
		</div>
	</div>
	<div class="col-lg-12">
		<?php foreach ($this->global->get_menu() as $menu) : ?>
			<?php if (array_search($this->session->userdata('level_id'), explode(",", $menu->menu_roles))) : ?>
				<?php foreach ($this->global->get_submenu($menu->menu_id) as $submenu) : ?>
					<?php if (array_search($this->session->userdata('level_id'), explode(",", $submenu->submenu_roles))) : ?>
						<div class="col-lg-3 col-6">
							<a href="<?= base_url($submenu->submenu_url) ?>" class="text-light">
								<div class="small-box p-2" style="background-color: #636e72">
									<div class="inner text-center">
										<h5 class="pt-4 pb-4" style="text-transform: uppercase;"><?= $submenu->submenu_nama ?></h5>
									</div>
									<div class="icon">
										<i class="fa fa-check-circle"></i>
									</div>
								</div>
							</a>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	</div>
</div>