<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Nama</th>
						<th>Tempat.Lahir</th>
						<th>Tanggal.Lahir</th>
						<th>Alamat</th>
						<th>Kontak</th>
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
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_nama">Nama</label>
							<input type="hidden" name="biodata_prakerin_id" id="biodata_prakerin_id">
							<input type="text" name="biodata_prakerin_nama" id="biodata_prakerin_nama" class="form-control" autocomplete="off" required="true" readonly="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="biodata_prakerin_tempat_lahir">Tempat Lahir</label>
							<input type="text" name="biodata_prakerin_tempat_lahir" id="biodata_prakerin_tempat_lahir" class="form-control" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="biodata_prakerin_tanggal_lahir">Tanggal Lahir</label>
							<input type="date" name="biodata_prakerin_tanggal_lahir" id="biodata_prakerin_tanggal_lahir" class="form-control" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_alamat">Alamat</label>
							<input type="text" name="biodata_prakerin_alamat" id="biodata_prakerin_alamat" class="form-control" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_telepon">Nomor Telepon</label>
							<input type="text" name="biodata_prakerin_telepon" id="biodata_prakerin_telepon" class="form-control" autocomplete="off" required="true">
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