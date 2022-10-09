<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="dtTable" class="table table-sm table-bordered table-hover text-nowrap">
					<thead>
						<th>No.</th>
						<th>Username</th>
						<th>Nama</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
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
							<label for="pembimbing_sekolah_user_login">Staff</label>
							<input type="hidden" name="pembimbing_sekolah_id" id="pembimbing_sekolah_id">
							<select name="pembimbing_sekolah_user_login" id="pembimbing_sekolah_user_login" class="form-control" required="true">
								<option value=""></option>
							</select>
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