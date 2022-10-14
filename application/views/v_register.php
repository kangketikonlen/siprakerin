<div class="register-box">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<span class="h4">
				Formulir Registrasi Prakerin <br /><?= $this->m->get_sysinfo()->info_registered ?>
			</span>
		</div>
		<?= form_open("#", array('id' => 'Frm')) ?>
		<div class="card-body">
			<p class="login-box-msg" style="font-size:small">
				Untuk pengalaman lebih baik, disarankan menggunakan browser <strong>chrome</strong> pada <strong>komputer pribadi (Laptop/PC Desktop)</strong>.
			</p>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="biodata_prakerin_nama">Nama</label>
						<input type="hidden" name="biodata_prakerin_user_login" id="biodata_prakerin_user_login">
						<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" required="true" readonly="true">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="biodata_prakerin_kelas">Kelas</label>
						<select name="biodata_prakerin_kelas" id="biodata_prakerin_kelas" class="form-control" required="true">
							<option value=""></option>
						</select>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="biodata_prakerin_prodi">Program Studi/Jurusan</label>
						<input type="text" name="biodata_prakerin_prodi" id="biodata_prakerin_prodi" class="form-control" autocomplete="off" required="true">
					</div>
				</div>
			</div>
			<div class="text-center mt-1" style="font-size:small">
				Crafted with <i class="fa fa-heart text-danger"></i> by <a href="<?= $this->m->get_sysinfo()->info_devs_url; ?>" target="_blank"><?= $this->m->get_sysinfo()->info_devs; ?></a>.<br /><?= $this->m->get_sysinfo()->info_registered; ?> @ <?= date('Y') ?> <span class="d-none d-sm-block">All rights reserved</span>
				<?php if (!empty($this->m->get_sysinfo()->info_sponsor)) : ?>
					<span class="d-block d-sm-none justify-content-center pt-1">
						Sponsored by<br /><a href="<?= $this->m->get_sysinfo()->info_sponsor_url ?>" target="_blank"><img src="<?= base_url($this->m->get_sysinfo()->info_sponsor_logo) ?>" alt="" width="100px"></a>
					</span>
				<?php endif ?>
			</div>
		</div>
		<div class="card-footer text-right">
			<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Submit</button>
		</div>
		<?= form_close() ?>
	</div>
</div>
<script>
	var username = "<?= $this->input->get('user') ?>";

	// option filter menu
	var kelasMenu = $('#biodata_prakerin_kelas');
	var optUrl = "<?= base_url('register/option_kelas/') ?>";
	createSelect2(kelasMenu, "Pilih kelas");
	requests(optUrl, "GET", {}).then(function(results) {
		populateOption(kelasMenu, results);
		loadData();
	}).catch(function(err) {
		pesan("Error " + err.status, "error", "Request " + err.statusText);
	});

	function loadData() {
		if (username) {
			$("#biodata_prakerin_user_login").val(username);
			var dataUrl = "<?= base_url('register/get_data/') ?>";
			var dataReq = encodeURI("?username=" + username);
			requests(dataUrl + dataReq, "GET").then(function(results) {
				if (results) {
					spreadEdit(results, $("#Frm"));
				} else {
					pesan("Siswa tidak di temukan dalam database!", "error", "", false);
				}
			}).catch(function(err) {
				pesan("Error " + err.status, "error", "Request " + err.statusText);
			});
		} else {
			pesan("Link pendaftaran hanya bisa di akses melalui portal siswa!", "error", "", false);
		}
	}

	$('#Frm').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('register/simpan') ?>";
		var dataReq = new FormData(this);
		var dataUsr = encodeURI("?username=" + username);
		confirmSave().then(function(status) {
			if (status) {
				requests(dataUrl + dataUsr, "POST", dataReq).then(function(results) {
					var msg = JSON.parse(results);
					var uri = "<?= base_url('register/validator?username=') ?>" + username;
					pesan(msg.warning, msg.kode, msg.pesan, false, uri);
				}).catch(function(err) {
					pesan("Error " + err.status, "error", "Request " + err.statusText);
				});
			}
		})
	});
</script>