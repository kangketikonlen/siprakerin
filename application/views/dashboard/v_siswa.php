<div class="row justify-content-center">
	<div class="col col-lg-12">
		<div class="jumbotron py-2 mb-1 text-center bg-transparent">
			<h1>Hi, <?= $this->session->userdata('nama') ?> <i class="far fa-grin-squint"></i></h1>
			<p class="lead">Silahkan akses fitur dengan menggunakan tombol navigasi di bawah ini.</p>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="card card-outline card-secondary">
					<div class="card-header">
						<h4 class="card-title">
							<i class="fa fa-info-circle text-info"></i>
							Informasi Prakerin
						</h4>
					</div>
					<div class="card-body text-justify" style="height: 100px">
						<?php if ($peserta->biodata_prakerin_status != "Disetujui") : ?>
							Prakerin kamu, sedang diproses oleh admin atau kamu belum mengisi biodata industri. Silahkan cek pada tombol navigasi di bawah.
						<?php else : ?>
							Prakerin kamu telah <strong>disetujui</strong>. Periode prakerin dari <strong class=" text-teal"><?= tgl_indo($industri->biodata_industri_tanggal_mulai) ?></strong> sampai <strong class="text-teal"><?= tgl_indo($industri->biodata_industri_tanggal_selesai) ?></strong>.
						<?php endif ?>
					</div>
				</div>
			</div>
			<?php if (!empty($industri) && !empty($industri->biodata_industri_tanggal_mulai)) : ?>
				<?php if ($industri->biodata_industri_tanggal_mulai <= date("Y-m-d") && $industri->biodata_industri_tanggal_selesai > date("Y-m-d")) : ?>
					<?php if ($peserta->biodata_prakerin_status == "Disetujui") : ?>
						<div class="col-lg-4">
							<div class="card card-outline card-secondary">
								<div class="card-header">
									<h4 class="card-title">
										<?php if (!empty($is_presence)) : ?>
											<i class="fa fa-check-circle text-success"></i>
										<?php else : ?>
											<i class="fa fa-times-circle text-danger"></i>
										<?php endif ?>
										Status Kehadiran
									</h4>
								</div>
								<div class="card-body" style="height: 100px">
									<?php if (!empty($is_presence)) : ?>
										Kamu udah <strong class=" text-teal">absen</strong> hari ini pada pukul, <strong><?= $is_presence->histori_kehadiran_jam_masuk ?></strong>. Jangan lupa tanda tangan pembimbing ya!
									<?php else : ?>
										Wah, hari ini kamu belum <strong class="text-teal">absen</strong> nih. Jangan lupa absen tepat waktu ya..
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card card-outline card-secondary">
								<div class="card-header">
									<h4 class="card-title">
										<?php if (!empty($is_journal)) : ?>
											<i class="fa fa-check-circle text-success"></i>
										<?php else : ?>
											<i class="fa fa-times-circle text-danger"></i>
										<?php endif ?>
										Status Agenda
									</h4>
								</div>
								<div class="card-body" style="height: 100px">
									<?php if (!empty($is_journal)) : ?>
										Kamu udah <strong class=" text-teal">mengisi agenda</strong> hari ini. Jangan lupa juga, meminta tanda tangan pembimbing!
									<?php else : ?>
										Duh, kamu belum <strong class="text-teal">mengisi agenda</strong>. Jangan lupa isi agenda setiap hari. Semangat, tinggal <strong class="text-lime"><?= count_days(date("Y-m-d"), $industri->biodata_industri_tanggal_selesai) ?> hari</strong> lagi nih..
									<?php endif ?>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php elseif ($industri->biodata_industri_tanggal_selesai <= date("Y-m-d")) : ?>
					<div class="col-lg-8">
						<div class="card card-outline card-secondary">
							<div class="card-header">
								<h4 class="card-title">
									<i class="fas fa-surprise text-success"></i>
									Prakerin Selesai, <?= tgl_indo($industri->biodata_industri_tanggal_selesai) ?>
								</h4>
							</div>
							<div class="card-body" style="height: 100px">
								Selamat, anda telah menyelesaikan prakerin. Terima kasih sudah menggunakan aplikasi ini. Semoga ilmu yang kamu dapatkan di dunia usaha dan industri bisa kamu terapkan di masa depan nanti.
							</div>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
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
									<i class="fa <?= $menu->menu_icon ?>"></i>
								</div>
							</div>
						</a>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php endforeach ?>
</div>