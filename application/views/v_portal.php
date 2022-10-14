<div class="d-flex align-items-center" style="min-height: 100vh">
	<div class="col-12 p-0">
		<section class="login-block">
			<div class="container">
				<div class="row h-100">
					<div class="col-md-4 login-sec">
						<h2 class="text-center mb-2">
							Login<br />
							<small style="font-size:80%;font-weight:bold">
								<span class=" d-block d-sm-none justify-content-center pt-1">
									<?= $this->m->get_instansi()->instansi_nama ?>
								</span>
							</small>
						</h2>
						<p class="text-center" style="font-size:small">Silahkan Anda login disini jika sudah memiliki username dan password</p>
						<form id="Frm" class="login-form" method="post">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="user_login" class="text-uppercase">Username</label>
										<input type="text" name="user_login" id="user_login" class="form-control" placeholder="Masukan username di sini..." autocomplete="off" required="true">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="user_pass" class="text-uppercase">Password / PIN</label>
										<input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Masukkan password di sini..." autocomplete="off" required="true">
									</div>
								</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-login btn-block">Submit</button>
								</div>
							</div>
						</form><br />
						<div class="text-center mt-1" style="font-size:small">
							Crafted with <i class="fa fa-heart text-danger"></i> by <a href="<?= $this->m->get_sysinfo()->info_devs_url; ?>" target="_blank"><?= $this->m->get_sysinfo()->info_devs; ?></a>.<br /><?= $this->m->get_sysinfo()->info_registered; ?> @ <?= date('Y') ?> <span class="d-none d-sm-block">All rights reserved</span>
							<?php if (!empty($this->m->get_sysinfo()->info_sponsor)) : ?>
								<span class="d-block d-sm-none justify-content-center pt-1">
									Sponsored by<br /><a href="<?= $this->m->get_sysinfo()->info_sponsor_url ?>" target="_blank"><img src="<?= base_url($this->m->get_sysinfo()->info_sponsor_logo) ?>" alt="" width="100px"></a>
								</span>
							<?php endif ?>
						</div>
					</div>
					<div class="col-md-8 banner-sec d-none d-sm-block">
						<div class="banner-text rounded-right p-3">
							<div class="d-flex align-items-center">
								<div class="col w-auto">
									<img src="<?= base_url($this->m->get_instansi()->instansi_logo) ?>" alt="" width="100px">
								</div>
								<div class="w-100">
									<h3 style="font-size:150%"><?= $this->m->get_sysinfo()->info_name; ?> <?= $this->m->get_instansi()->instansi_nama ?> <br />
										<small style="font-size:60%"><?= $this->m->get_instansi()->instansi_alamat ?> (<?= $this->m->get_instansi()->instansi_kontak ?>)</small>
									</h3>
								</div>
							</div>
							<p class="m-0 text-justify">
								Silahkan mengisi formulir di samping menggunakan username dan password yang telah di berikan oleh administrator atau anda buat sebelumnya.
								<?php if (!empty($this->m->get_sysinfo()->info_sponsor)) : ?>
									Sistem ini di sponsori oleh : <br />
									<span class="d-flex justify-content-center pt-1">
										<a href="<?= $this->m->get_sysinfo()->info_sponsor_url ?>" target="_blank"><img src="<?= base_url($this->m->get_sysinfo()->info_sponsor_logo) ?>" alt="" width="200px"></a>
									</span>
								<?php endif ?>
							</p>
						</div>
					</div>
				</div>
		</section>
	</div>
</div>
<script>
	$('#Frm').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('portal/proses_login') ?>";
		var dataReq = new FormData(this);
		confirmLogin().then(function(status) {
			if (status) {
				requests(dataUrl, "POST", dataReq).then(function(results) {
					var msg = JSON.parse(results);
					pesanThenReload(msg.warning, msg.kode, msg.pesan, true);
				}).catch(function(err) {
					pesan("Error " + err.status, "error", "Request " + err.statusText);
				});
			}
		})
	});
</script>