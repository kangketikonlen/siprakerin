<div class="row">
	<div class="col col-lg-12 mt-3">
		<?= form_open("#", array('id' => 'Frm')) ?>
		<div class="card">
			<div class="card-body">
				<p class="text-sm text-center">
					Silahkan mengisi formulir nilai di bawah ini dengan <strong>range 0 - 100</strong>.<br />
					Nilai prakerin ini ditujukan untuk <strong><?= $peserta->biodata_prakerin_nama ?></strong>
				</p>
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<!-- Start form 1 -->
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_1">Pengetahuan Kerja</label>
											<input type="hidden" name="nilai_prakerin_id" id="nilai_prakerin_id" />
											<input type=" number" min="0" max="100" name="nilai_prakerin_1" id="nilai_prakerin_1" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_2">Kemampuan Kerja</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_2" id="nilai_prakerin_2" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_3">Kualitas Kerja</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_3" id="nilai_prakerin_3" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="nilai_prakerin_4">Sikap</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_4" id="nilai_prakerin_4" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="nilai_prakerin_5">Kerja Sama</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_5" id="nilai_prakerin_5" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<!-- Start form 2 -->
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_6">Disiplin</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_6" id="nilai_prakerin_6" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_7">Tanggung Jawab</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_7" id="nilai_prakerin_7" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="nilai_prakerin_8">Kerajinan</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_8" id="nilai_prakerin_8" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="nilai_prakerin_9">Inisiatif</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_9" id="nilai_prakerin_9" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="nilai_prakerin_10">Laporan hasil Praktik</label>
											<input type="number" min="0" max="100" name="nilai_prakerin_10" id="nilai_prakerin_10" class="form-control" required="true" autocomplete="off" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="text-sm text-center">
					<span id="validator">Unsigned</span>
				</p>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>