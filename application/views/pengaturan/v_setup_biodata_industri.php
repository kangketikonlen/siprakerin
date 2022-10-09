<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="card-body">
				<div class="row">
					<!-- Start form data industri -->
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_nama">Nama Tempat Industri</label>
									<input type="hidden" name="biodata_industri_id" id="biodata_industri_id">
									<input type="text" name="biodata_industri_nama" id="biodata_industri_nama" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_alamat">Alamat</label>
									<input type="text" name="biodata_industri_alamat" id="biodata_industri_alamat" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_telepon">Kontak</label>
									<input type="text" name="biodata_industri_telepon" id="biodata_industri_telepon" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_bidang_usaha">Bidang Usaha</label>
									<input type="text" name="biodata_industri_bidang_usaha" id="biodata_industri_bidang_usaha" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_direktur">Direktur/Pimpinan</label>
									<input type="text" name="biodata_industri_nama_direktur" id="biodata_industri_nama_direktur" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_pembimbing_1">Pembimbing 1</label>
									<input type="text" name="biodata_industri_nama_pembimbing_1" id="biodata_industri_nama_pembimbing_1" class="form-control" autocomplete="off" required="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_pembimbing_2">Pembimbing 2</label>
									<input type="text" name="biodata_industri_nama_pembimbing_2" id="biodata_industri_nama_pembimbing_2" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_tanggal_mulai">Tanggal Mulai</label>
									<input type="date" name="biodata_industri_tanggal_mulai" id="biodata_industri_tanggal_mulai" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_tanggal_selesai">Tanggal Selesai</label>
									<input type="date" name="biodata_industri_tanggal_selesai" id="biodata_industri_tanggal_selesai" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
					<!-- End form data industri -->
				</div>
			</div>
			<div class="card-footer text-right">
				<div class="btn-group">
					<a href="<?= base_url() ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>