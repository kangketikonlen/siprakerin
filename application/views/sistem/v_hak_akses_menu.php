<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Akses menu</h4>
			</div>
			<div class="card-body row">
				<?php foreach ($this->global->get_menu() as $menu) : ?>
					<?php if ($menu->menu_id > 1) : ?>
						<div class="col-lg-3 col-6">
							<a href="#" id="setup" data="<?= $menu->menu_id ?>" class="small-box-footer">
								<div class="small-box text-light" style="background-color: #3DB2FF">
									<div class="inner text-center">
										<h5 class="pt-4 pb-4" style="text-transform: uppercase;"><?= $menu->menu_nama ?></h5>
									</div>
									<div class="icon">
										<i class="fa <?= $menu->menu_icon ?>"></i>
									</div>
								</div>
							</a>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
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
						<th>menu</th>
						<th>Root</th>
						<th>Nama</th>
						<th>Roles</th>
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
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="submenu_id" id="submenu_id">
						<input type="hidden" name="submenu_roles" id="submenu_roles">
						<h4 id="submenu_nama"></h4>
					</div>
					<?php foreach ($this->m->get_level() as $level) : ?>
						<div class="col-lg-6">
							<div class="form-check">
								<input type="checkbox" name="submenu_roles_checked[]" id="submenu_roles_<?= $level->level_id ?>" class=" form-check-input" value="<?= $level->level_id ?>">
								<label class="form-check-label" for="submenu_roles_<?= $level->level_id ?>"><?= $level->level_nama ?></label>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<div class="modal fade" id="frmSetup">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'FrmSetup')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="menu_id" id="menu_id">
						<input type="hidden" name="menu_roles" id="menu_roles">
						<h4 id="menu_nama"></h4>
					</div>
					<?php foreach ($this->m->get_level() as $level) : ?>
						<div class="col-lg-6">
							<div class="form-check">
								<input type="checkbox" name="menu_roles_checked[]" id="menu_roles_<?= $level->level_id ?>" class=" form-check-input" value="<?= $level->level_id ?>">
								<label class="form-check-label" for="menu_roles_<?= $level->level_id ?>"><?= $level->level_nama ?></label>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>