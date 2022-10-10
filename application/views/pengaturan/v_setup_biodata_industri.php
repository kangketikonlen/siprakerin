<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="card-body">
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<p class="text-sm text-justify">
							Helo, <strong class="text-teal"><?= $this->session->userdata('nama') ?></strong> silahkan lengkapi data industri tempat kamu akan melakukan Praktek Kerja Lapangan. Untuk pengalaman lebih baik, disarankan menggunakan browser <strong class="text-teal">chrome</strong> pada <strong class="text-teal">komputer pribadi (Laptop/PC Desktop)</strong>. Setelah mengisi data di samping, tunggu sampai administrator menyetujui dan melakukan validasi datamu. Setelah disetujui, kamu akan bisa menggunakan modul <strong class="text-teal">kehadiran</strong> dan <strong class="text-teal">agenda kegiatan</strong>. Terima kasih, semoga Praktek Kerja Lapangan-mu menyenangkan!
						</p>
						<p class="text-center h4">
							<i class="far fa-2x fa-smile-wink text-teal"></i>
						</p>
					</div>
					<!-- Start form data industri -->
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
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