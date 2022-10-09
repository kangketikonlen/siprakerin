<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Icon</th>
						<th>Nama</th>
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
					<div class="col-lg-6">
						<div class="form-group">
							<label for="menu_urutan">Urutan</label>
							<input type="hidden" name="menu_id" id="menu_id">
							<input type="number" min="0" name="menu_urutan" id="menu_urutan" class="form-control form-control-sm" placeholder="Masukkan urutan <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="menu_icon">Icon</label>
							<input type="text" name="menu_icon" id="menu_icon" class="form-control form-control-sm" placeholder="Masukkan icon <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="menu_nama">Nama</label>
							<input type="text" name="menu_nama" id="menu_nama" class="form-control form-control-sm" placeholder="Masukkan nama <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="alert alert-danger">
							<b>Note 1</b>: Mohon untuk tidak menggunakan karakter <i>spesial</i>, <i>angka</i> atau <i>spasi</i> pada kolom isian <strong>Nama</strong>. Karena data tersebut akan dijadikan untuk pembuatan <strong>slug url</strong>. Gunakan kata baris tunggal!. Dan, pastikan data pada <strong>Nama</strong> unique!.
						</div>
						<div class="alert alert-light">
							<b>Note 2</b>: Pembuatan template secara otomatis hanya berlaku <strong>sekali saja</strong>, ketika <strong>input pertama</strong>. Jika ingin mengedit atau menghapus <code>Nama</code> maka anda harus mengedit atau menghapus <code>file script</code> tersebut secara manual.
						</div>
						<div class="alert alert-light m-0">
							<b>Note 3</b>: Untuk pengisian <code>Icon</code>, silahkan melihat referensi pada halaman <a href="https://cutt.ly/Fm53NAH" class="text-info" target="_blank">Fontawesome</a> dengan format <code>fa-<i>nama-icon</i></code>.
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