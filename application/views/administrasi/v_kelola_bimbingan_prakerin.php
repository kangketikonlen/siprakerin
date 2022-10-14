<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="dtTable" class="table table-sm table-bordered table-hover text-nowrap">
					<thead>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Siswa</th>
						<th>Keterangan</th>
						<th>Digisign</th>
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
							<label for="bimbingan_prakerin_tanggal">Tanggal</label>
							<input type="hidden" name="bimbingan_prakerin_id" id="bimbingan_prakerin_id">
							<input type="date" name="bimbingan_prakerin_tanggal" id="bimbingan_prakerin_tanggal" class="form-control" autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="biodata_prakerin_id">Siswa Prakerin</label>
							<select name="biodata_prakerin_id" id="biodata_prakerin_id" class="form-control" required="true">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="bimbingan_prakerin_keterangan">Keterangan</label>
							<textarea name="bimbingan_prakerin_keterangan" id="bimbingan_prakerin_keterangan" class="form-control" rows="5" autocomplete="off"></textarea>
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
				<h4 class="modal-title">Digisign QRCode</h4>
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