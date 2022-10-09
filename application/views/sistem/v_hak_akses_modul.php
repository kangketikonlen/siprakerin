<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="dtTable" class="table table-sm table-bordered">
					<thead>
						<th>No.</th>
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
				<h4 class="modal-title">Formulir <?= $Title ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?= form_open("#", array('id' => 'Frm')) ?>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="hidden" name="level_id" id="level_id">
						<input type="hidden" name="level_show_landing" id="level_show_landing">
						<h4 id="level_nama"></h4>
					</div>
					<?php foreach ($this->m->get_users() as $user) : ?>
						<div class="col-lg-6">
							<div class="form-check">
								<input type="checkbox" name="level_show_landing_checked[]" id="level_show_landing_<?= $user->user_id ?>" class=" form-check-input" value="<?= $user->user_id ?>">
								<label class="form-check-label" for="level_show_landing_<?= $user->user_id ?>"><?= $user->user_nama ?></label>
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