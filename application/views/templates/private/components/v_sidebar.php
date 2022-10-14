<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
	<!-- Brand Logo -->
	<a href="<?= base_url() ?>" class="brand-link" style="font-size: small;">
		<i class="fa fa-2x fa-info-circle brand-image" style="margin-top:-2px"></i>
		<strong><u><span class="brand-text font-weight-light"><?= $this->session->userdata('AppInfo') ?></span></u></strong>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-compact text-sm" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($Root == "Dashboard" ? "active" : "") ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php foreach ($this->global->get_menu() as $menu) : ?>
					<?php if (array_search($this->session->userdata('level_id'), explode(",", $menu->menu_roles))) : ?>
						<li class="nav-item has-treeview <?= ($Root == $menu->menu_nama ? "menu-open" : "") ?>">
							<a href="#" class="nav-link <?= ($Root == $menu->menu_nama ? "active" : "") ?>">
								<i class="nav-icon fas <?= $menu->menu_icon ?>"></i>
								<p>
									<?= $menu->menu_nama ?>
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<?php foreach ($this->global->get_submenu($menu->menu_id) as $submenu) : ?>
								<?php if (array_search($this->session->userdata('level_id'), explode(",", $submenu->submenu_roles))) : ?>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?= base_url($submenu->submenu_url) ?>" class="nav-link <?= ($Title == $submenu->submenu_root ? "active" : "") ?>">
												<i class="far fa-circle nav-icon"></i>
												<p><?= $submenu->submenu_nama ?></p>
											</a>
										</li>
									</ul>
								<?php endif ?>
							<?php endforeach ?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>