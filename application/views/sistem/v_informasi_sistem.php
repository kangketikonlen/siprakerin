<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card card-primary">
				<div class="card-header">
					<h4 class="card-title">Formulir <?= $Title ?></h4>
				</div>
				<?= form_open("#", array('id' => 'Frm')) ?>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="info_name">Singkatan Aplikasi</label>
								<input type="hidden" name="info_id" id="info_id">
								<input type="text" name="info_name" id="info_name" class="form-control form-control-sm" placeholder="Contoh DIGIMON..." autocomplete="off" required="true">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="info_full_name">Judul Aplikasi</label>
								<input type="text" name="info_full_name" id="info_full_name" class="form-control form-control-sm" placeholder="Contoh Digital Monster..." autocomplete="off" required="true">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="info_devs">Developer Aplikasi</label>
								<input type="text" name="info_devs" id="info_devs" class="form-control form-control-sm" placeholder="Contoh Akiyoshi Hongo..." autocomplete="off" required="true">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="info_devs_url">Website Developer</label>
								<input type="text" name="info_devs_url" id="info_devs_url" class="form-control form-control-sm" placeholder="Contoh https://digimon.net..." autocomplete="off" required="true">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="info_registered">Nama atau Instansi Client</label>
								<input type="text" name="info_registered" id="info_registered" class="form-control form-control-sm" placeholder="Contoh Gilang Pratama..." autocomplete="off" required="true">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="info_sponsor">Sponsor Aplikasi (Jika ada)</label>
								<input type="text" name="info_sponsor" id="info_sponsor" class="form-control form-control-sm" placeholder="Contoh Konami Digital Entertainment Co., Ltd...." autocomplete="off">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="info_sponsor_url">Website Sponsor (Jika ada)</label>
								<input type="text" name="info_sponsor_url" id="info_sponsor_url" class="form-control form-control-sm" placeholder="Contoh https://www.konami.com/..." autocomplete="off">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Logo
									<small>*Max 10MB | JPG, PNG</small>
								</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="info_sponsor_image" id="info_sponsor_image" class="custom-file-input">
										<label class="custom-file-label" for="info_sponsor_image">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
									<input type="hidden" name="info_status_sosmed" id="info_status_sosmed">
									<input type="checkbox" class="custom-control-input" id="info_status_sosmed_control">
									<label class="custom-control-label" for="info_status_sosmed_control">Aktifkan registrasi dan login melalui sosial media?</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>