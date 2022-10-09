<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Nama</th>
						<th>Url</th>
						<th>Tipe</th>
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
				<h4 class="modal-title">Formulir Level</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="level_nama">Nama</label>
							<input type="hidden" name="level_id" id="level_id">
							<input type="text" name="level_nama" id="level_nama" class="form-control form-control-sm" placeholder="Masukkan nama level..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="level_icon">Icon</label>
							<input type="text" name="level_icon" id="level_icon" class="form-control form-control-sm" placeholder="Masukkan icon level..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="level_background">#Hex Background</label>
							<input type="text" name="level_background" id="level_background" class="form-control form-control-sm" placeholder="Masukkan warna level..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="level_type">Tipe Halaman</label>
							<select name="level_type" id="level_type" class="form-control form-control-sm" required="true">
								<option value=""></option>
								<option value="Landing">Landing</option>
								<option value="Dashboard">Dashboard</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="alert alert-danger">
							<b>Note 1</b>: Mohon untuk tidak menggunakan karakter spesial atau angka pada kolom isian <strong>Nama</strong>. Karena data tersebut akan dijadikan untuk pembuatan <strong>slug url</strong>. Gunakan alphabet dan spasi saja!. Dan, pastikan data pada <strong>Nama</strong> unique!.
						</div>
						<div class="alert alert-light">
							<b>Note 2</b>: Pembuatan template secara otomatis hanya berlaku <strong>sekali saja</strong>, ketika <strong>input pertama</strong>. Jika ingin mengedit <code>Nama</code> atau <code>Tipe Halaman</code> maka anda harus mengedit atau menghapus <code>file script</code> tersebut secara manual.
						</div>
						<div class="alert alert-light m-0">
							<b>Note 3</b>: Untuk pengisian <code>Icon</code>, silahkan melihat referensi pada halaman <a href="https://cutt.ly/Fm53NAH" class="text-info" target="_blank">Fontawesome</a> dengan format <code>fa-<i>nama-icon</i></code>. Dan, untuk pengisian <code>#Hex Background</code> gunakan kode warna hex dengan format <code>#<i>kodewarna</i></code>. Untuk penjelasan <code>Tipe Halaman</code>, silahkan melihat pada file <a href="https://cutt.ly/Sm58OzX" class="text-info" target="_blank">README.MD</a>.
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