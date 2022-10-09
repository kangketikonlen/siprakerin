<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Nama</th>
						<th>User</th>
						<th>Pass</th>
						<th>Url</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="instansi_nama">Nama</label>
							<input type="hidden" name="instansi_id" id="instansi_id">
							<input type="text" name="instansi_nama" id="instansi_nama" class="form-control form-control-sm" placeholder="Masukkan deskripsi <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="instansi_alamat_email">Email</label>
							<input type="email" name="instansi_alamat_email" id="instansi_alamat_email" class="form-control form-control-sm" placeholder="Masukkan email <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="instansi_alamat">Alamat</label>
							<input type="text" name="instansi_alamat" id="instansi_alamat" class="form-control form-control-sm" placeholder="Masukkan alamat <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="instansi_website">Website Instansi</label>
							<input type="text" name="instansi_website" id="instansi_website" class="form-control form-control-sm" placeholder="Masukkan website <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="instansi_url_sistem">Url Sistem</label>
							<input type="text" name="instansi_url_sistem" id="instansi_url_sistem" class="form-control form-control-sm" placeholder="Masukkan url sistem <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="instansi_kontak">Kontak Instansi</label>
							<input type="text" name="instansi_kontak" id="instansi_kontak" class="form-control form-control-sm" placeholder="Masukkan kontak instansi <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Logo
								<small>*Max 10MB | JPG, PNG</small>
							</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" name="instansi_logo" id="instansi_logo" class="custom-file-input">
									<label class="custom-file-label" for="instansi_logo">Choose file</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Background
								<small>*Max 10MB | JPG, PNG</small>
							</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" name="instansi_background" id="instansi_background" class="custom-file-input">
									<label class="custom-file-label" for="instansi_background">Choose file</label>
								</div>
							</div>
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