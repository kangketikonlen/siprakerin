<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<select name="filter_menu_id" id="filter_menu_id" class="form-control" required="true">
					<option value=""></option>
				</select>
			</div>
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
						<th>Menu</th>
						<th>Root</th>
						<th>Nama</th>
						<th>URL</th>
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
							<label for="menu_id">Menu Utama</label>
							<input type="hidden" name="submenu_id" id="submenu_id">
							<select name="menu_id" id="menu_id" class="form-control" required="true">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="submenu_urutan">Urutan</label>
							<input type="number" name="submenu_urutan" id="submenu_urutan" class="form-control" placeholder="Masukkan urutan <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="submenu_root">Tag</label>
							<input type="text" name="submenu_root" id="submenu_root" class="form-control" placeholder="Masukkan tag <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="submenu_nama">Nama</label>
							<input type="text" name="submenu_nama" id="submenu_nama" class="form-control" placeholder="Masukkan nama <?= strtolower($Title) ?>..." autocomplete="off" required="true">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="alert alert-danger">
							<b>Note 1</b>: Mohon untuk tidak menggunakan karakter spesial atau angka pada kolom isian <strong>Tag</strong>. Karena data tersebut akan dijadikan untuk pembuatan <strong>slug url</strong>. Gunakan alphabet dan spasi saja!. Dan, pastikan data pada <strong>Tag</strong> unique!.
						</div>
						<div class="alert alert-light m-0">
							<b>Note 2</b>: Pembuatan template secara otomatis hanya berlaku <strong>sekali saja</strong>, ketika <strong>input pertama</strong>. Jika ingin mengedit atau menghapus <code>Tag</code> atau <code>Menu Utama</code> maka anda harus mengedit atau menghapus <code>file script</code> tersebut secara manual.
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