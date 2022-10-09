<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body table-responsive">
				<table id="dtTable" class="table table-sm table-bordered table-hover text-nowrap">
					<thead>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Masuk</th>
						<th>Pulang</th>
						<th>Digisign</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="card-footer text-right">
				<div class="btn-group">
					<a href="<?= base_url() ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
					<button type="button" id="btn-masuk" class="btn btn-success">
						<i class="fa fa-download"></i> Absen Masuk
					</button>
					<button type="button" id="btn-pulang" class="btn btn-danger">
						<i class="fa fa-upload"></i> Absen Pulang
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="frmData">
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