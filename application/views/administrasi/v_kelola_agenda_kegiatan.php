<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Pekerjaan</th>
						<th>Digisign</th>
						<th><i class="fa fa-cogs"></i></th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer text-right">
				<div class="btn-group">
					<a href="<?= base_url() ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#frmData"><i class="fa fa-plus"></i> Tambah Data</button>
				</div>
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
							<label for="histori_agenda_kegiatan_tanggal">Tanggal</label>
							<input type="hidden" name="histori_agenda_kegiatan_id" id="histori_agenda_kegiatan_id">
							<input type="date" name="histori_agenda_kegiatan_tanggal" id="histori_agenda_kegiatan_tanggal" class="form-control form-control-sm" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="histori_agenda_kegiatan_pekerjaan">Deskripsi Pekerjaan</label>
							<textarea name="histori_agenda_kegiatan_pekerjaan" id="histori_agenda_kegiatan_pekerjaan" class="form-control" rows="10" autocomplete="off" required="true"></textarea>
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
<div class="modal fade" id="modal-qrcode">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="qrcode" class="col-lg-12 text-center">
						<img id="qrcode-images" class="img-responsive w-50" alt="qrcode_images" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>