<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="dtTable" class="table table-sm table-bordered table-hover text-nowrap">
					<thead>
						<th>No.</th>
						<th>Nama</th>
						<th>Industri</th>
						<th>Mulai</th>
						<th>Selesai</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="biodata_industri_tanggal_mulai">Periode Mulai</label>
							<input type="hidden" name="biodata_industri_id" id="biodata_industri_id">
							<input type="hidden" name="biodata_pendaftar_id" id="biodata_pendaftar_id">
							<input type="date" name="biodata_industri_tanggal_mulai" id="biodata_industri_tanggal_mulai" class="form-control form-control-sm" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="biodata_industri_tanggal_selesai">Periode Selesai</label>
							<input type="date" name="biodata_industri_tanggal_selesai" id="biodata_industri_tanggal_selesai" class="form-control form-control-sm" autocomplete="off" required="true">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-bioprakerin">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Detail Biodata Siswa</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'form-bioprakerin')) ?>
			<div class="modal-body">
				<div class="row">
					<!-- Start form data pribadi -->
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_nama">Nama</label>
									<input type="hidden" name="biodata_prakerin_id" id="biodata_prakerin_id">
									<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tempat_lahir">Tempat Lahir</label>
									<input type="text" name="biodata_prakerin_tempat_lahir" id="biodata_prakerin_tempat_lahir" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tanggal_lahir">Tanggal Lahir</label>
									<input type="date" name="biodata_prakerin_tanggal_lahir" id="biodata_prakerin_tanggal_lahir" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_alamat">Alamat</label>
									<input type="text" name="biodata_prakerin_alamat" id="biodata_prakerin_alamat" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_telepon">Nomor Telepon</label>
									<input type="text" name="biodata_prakerin_telepon" id="biodata_prakerin_telepon" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<!-- End form data pribadi -->
					<!-- Start form data ayah -->
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_nama_ayah">Nama Ayah</label>
									<input type="text" name="biodata_prakerin_nama_ayah" id="biodata_prakerin_nama_ayah" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tempat_lahir_ayah">Tempat Lahir Ayah</label>
									<input type="text" name="biodata_prakerin_tempat_lahir_ayah" id="biodata_prakerin_tempat_lahir_ayah" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
									<input type="date" name="biodata_prakerin_tanggal_lahir_ayah" id="biodata_prakerin_tanggal_lahir_ayah" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_pekerjaan_ayah">Pekerjaan Ayah</label>
									<input type="text" name="biodata_prakerin_pekerjaan_ayah" id="biodata_prakerin_pekerjaan_ayah" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_pendidikan_ayah">Pendidikan Ayah</label>
									<input type="text" name="biodata_prakerin_pendidikan_ayah" id="biodata_prakerin_pendidikan_ayah" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<!-- End form data ayah -->
					<!-- Start form data ibu -->
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_nama_ibu">Nama Ibu</label>
									<input type="text" name="biodata_prakerin_nama_ibu" id="biodata_prakerin_nama_ibu" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tempat_lahir_ibu">Tempat Lahir Ibu</label>
									<input type="text" name="biodata_prakerin_tempat_lahir_ibu" id="biodata_prakerin_tempat_lahir_ibu" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_prakerin_tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
									<input type="date" name="biodata_prakerin_tanggal_lahir_ibu" id="biodata_prakerin_tanggal_lahir_ibu" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_pekerjaan_ibu">Pekerjaan Ibu</label>
									<input type="text" name="biodata_prakerin_pekerjaan_ibu" id="biodata_prakerin_pekerjaan_ibu" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label for="biodata_prakerin_pendidikan_ibu">Pendidikan Ibu</label>
									<input type="text" name="biodata_prakerin_pendidikan_ibu" id="biodata_prakerin_pendidikan_ibu" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<!-- End form data ibu -->
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-bioindustri">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Detail Biodata Industri</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'form-bioindustri')) ?>
			<div class="modal-body">
				<div class="row">
					<!-- Start form data industri -->
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_nama">Nama Tempat Industri</label>
									<input type="hidden" name="biodata_industri_id" id="biodata_industri_id">
									<input type="text" name="biodata_industri_nama" id="biodata_industri_nama" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_alamat">Alamat</label>
									<input type="text" name="biodata_industri_alamat" id="biodata_industri_alamat" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_telepon">Kontak</label>
									<input type="text" name="biodata_industri_telepon" id="biodata_industri_telepon" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="biodata_industri_bidang_usaha">Bidang Usaha</label>
									<input type="text" name="biodata_industri_bidang_usaha" id="biodata_industri_bidang_usaha" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_direktur">Direktur/Pimpinan</label>
									<input type="text" name="biodata_industri_nama_direktur" id="biodata_industri_nama_direktur" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_pembimbing_1">Pembimbing 1</label>
									<input type="text" name="biodata_industri_nama_pembimbing_1" id="biodata_industri_nama_pembimbing_1" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="biodata_industri_nama_pembimbing_2">Pembimbing 2</label>
									<input type="text" name="biodata_industri_nama_pembimbing_2" id="biodata_industri_nama_pembimbing_2" class="form-control" autocomplete="off" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<!-- End form data industri -->
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>