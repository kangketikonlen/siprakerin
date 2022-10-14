<div class="register-box w-25">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<span class="h4">
				Sistem Tanda Tangan Digital <br /><?= $this->m->get_sysinfo()->info_registered ?>
			</span>
		</div>
		<?= form_open("#", array('id' => 'Frm')) ?>
		<div class="card-body">
			<p class="login-box-msg" style="font-size:small">
				Tanda tangan ini mengikat pada <strong>device anda.</strong>
				Jika anda melakukan validasi menggunakan device baru, maka <i>public key</i> anda akan berubah.
				Untuk kenyamanan, harap gunakan <strong>device yang sama secara konstan</strong>.
			</p>
			<div class="row">
				<?php if ($this->input->get('type') == "kehadiran") : ?>
					<!-- Start Form Kehadiran -->
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_nama">Nama Siswa</label>
							<input type="hidden" name="histori_kehadiran_id" id="histori_kehadiran_id">
							<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="histori_kehadiran_tanggal">Tanggal Kehadiran</label>
							<input type="date" name="histori_kehadiran_tanggal" id="histori_kehadiran_tanggal" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="histori_kehadiran_jam_masuk">Jam Masuk</label>
							<input type="time" name="histori_kehadiran_jam_masuk" id="histori_kehadiran_jam_masuk" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="histori_kehadiran_jam_pulang">Jam Masuk</label>
							<input type="time" name="histori_kehadiran_jam_pulang" id="histori_kehadiran_jam_pulang" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<!-- End Form Kehadiran -->
				<?php elseif ($this->input->get('type') == "agenda") : ?>
					<!-- Start Form Kehadiran -->
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_nama">Nama Siswa</label>
							<input type="hidden" name="histori_agenda_kegiatan_id" id="histori_agenda_kegiatan_id">
							<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="histori_agenda_kegiatan_tanggal">Tanggal Kegiatan</label>
							<input type="date" name="histori_agenda_kegiatan_tanggal" id="histori_agenda_kegiatan_tanggal" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="histori_agenda_kegiatan_pekerjaan">Deskripsi Kegiatan/Pekerjaan</label>
							<textarea name="histori_agenda_kegiatan_pekerjaan" id="histori_agenda_kegiatan_pekerjaan" class="form-control" rows="5" autocomplete="off" disabled="true"></textarea>
						</div>
					</div>
					<!-- End Form Kehadiran -->
				<?php elseif ($this->input->get('type') == "bimbingan") : ?>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="bimbingan_prakerin_tanggal">Tanggal</label>
							<input type="hidden" name="bimbingan_prakerin_id" id="bimbingan_prakerin_id">
							<input type="date" name="bimbingan_prakerin_tanggal" id="bimbingan_prakerin_tanggal" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_nama">Siswa Prakerin</label>
							<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" disabled="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="bimbingan_prakerin_keterangan">Keterangan</label>
							<textarea name="bimbingan_prakerin_keterangan" id="bimbingan_prakerin_keterangan" class="form-control" rows="5" autocomplete="off" disabled="true"></textarea>
						</div>
					</div>
				<?php endif ?>
			</div>
			<p class="login-box-msg" style="font-size:small">
				<span id="validator">Unsigned</span>
			</p>
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
			<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Tanda Tangan</button>
		</div>
		<?= form_close() ?>
	</div>
</div>
<script>
	var type = "<?= $this->input->get('type') ?>";
	var id = "<?= $this->input->get('id') ?>";

	if (type == "kehadiran") {
		$("#histori_kehadiran_id").val(id);
		var dataUrl = "<?= base_url('digisign/get_data/') ?>";
		var dataReq = encodeURI("?id=" + id);
		requests(dataUrl + dataReq, "GET").then(function(results) {
			if (results) {
				var data = JSON.parse(results);
				if (data.histori_kehadiran_validator) {
					$("#validator").html(`Signed, <strong>` + truncate(data.histori_kehadiran_validator, 10) + `</strong>`);
				}
				spreadEdit(results, $("#Frm"));
			} else {
				pesan("Data tidak di temukan dalam database!", "error", "", false);
			}
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});
	} else if (type == "agenda") {
		$("#histori_agenda_kegiatan_id").val(id);
		var dataUrl = "<?= base_url('digisign/get_data_agenda/') ?>";
		var dataReq = encodeURI("?id=" + id);
		requests(dataUrl + dataReq, "GET").then(function(results) {
			if (results) {
				var data = JSON.parse(results);
				if (data.histori_agenda_kegiatan_validator) {
					$("#validator").html(`Signed, <strong>` + truncate(data.histori_agenda_kegiatan_validator, 10) + `</strong>`);
				}
				spreadEdit(results, $("#Frm"));
			} else {
				pesan("Data tidak di temukan dalam database!", "error", "", false);
			}
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});
	} else if (type == "bimbingan") {
		$("#bimbingan_prakerin_id").val(id);
		var dataUrl = "<?= base_url('digisign/get_data_bimbingan/') ?>";
		var dataReq = encodeURI("?id=" + id);
		requests(dataUrl + dataReq, "GET").then(function(results) {
			if (results) {
				var data = JSON.parse(results);
				if (data.bimbingan_prakerin_validator) {
					$("#validator").html(`Signed, <strong>` + truncate(data.bimbingan_prakerin_validator, 10) + `</strong>`);
				}
				spreadEdit(results, $("#Frm"));
			} else {
				pesan("Data tidak di temukan dalam database!", "error", "", false);
			}
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});
	} else {
		pesan("Link hanya bisa di akses melalui QRCode!", "error", "", false);
	}

	$('#Frm').submit(function(e) {
		e.preventDefault();
		if (type == "kehadiran") {
			var dataUrl = "<?= base_url('digisign/simpan') ?>";
		} else if (type == "agenda") {
			var dataUrl = "<?= base_url('digisign/simpan_agenda') ?>";
		} else if (type == "bimbingan") {
			var dataUrl = "<?= base_url('digisign/simpan_bimbingan') ?>";
		}
		var dataReq = new FormData(this);
		var dataUsr = encodeURI("?id=" + id);
		confirmSave().then(function(status) {
			if (status) {
				requests(dataUrl + dataUsr, "POST", dataReq).then(function(results) {
					var msg = JSON.parse(results);
					// var uri = "<?= base_url('register/validator?id=') ?>" + id;
					// pesan(msg.warning, msg.kode, msg.pesan, false, uri);
					pesan(msg.warning, msg.kode, msg.pesan, false);
				}).catch(function(err) {
					pesan("Error " + err.status, "error", "Request " + err.statusText);
				});
			}
		})
	});
</script>