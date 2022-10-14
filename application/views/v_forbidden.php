<div class="error-page">
	<h2 class="headline text-danger">503</h2>
	<div class="error-content">
		<h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Akses Diblokir Sementara.</h3>
		<?php if (empty($this->input->get('access'))) : ?>
			<p>
				Untuk sekarang, anda belum bisa mengakses halaman ini,
				Sementara, silahkan <a href="<?= base_url() ?>">kembali ke beranda</a>
				atau tunggu sampai administrator memberikan akses.
			</p>
		<?php else : ?>
			<?php if ($Instansi->instansi_id == 1) : ?>
				<?php $url = "http://localhost:8080/sims"; ?>
			<?php else : ?>
				<?php $url = "https://sisfo.smkattaqwa05kebalen.sch.id"; ?>
			<?php endif ?>
			<p>
				Untuk sekarang, anda belum bisa mengakses halaman ini,
				Sementara, silahkan <a href="<?= $url ?>">kembali ke beranda</a>
				atau tunggu sampai administrator memberikan akses.
			</p>
		<?php endif ?>
	</div>
</div>