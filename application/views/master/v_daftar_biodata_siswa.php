<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Username</th>
						<th>Nama</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Detail <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
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