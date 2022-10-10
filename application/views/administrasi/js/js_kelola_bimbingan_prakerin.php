<script>
	$(document).ready(function() {
		// option filter menu
		var siswaPrakerin = $('#biodata_prakerin_id');
		var optUrl = "<?= base_url('master/daftar_biodata_siswa/options/') ?>";
		createSelect2(siswaPrakerin, "Pilih siswa prakerin");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(siswaPrakerin, results);
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		var tableUrl = "<?= base_url('administrasi/kelola_bimbingan_prakerin/list_data?') ?>";

		var listsColumn = [{
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1 + ".";
				}
			},
			{
				render: function(data, type, row, meta) {
					return tgl_indo(row[1]);
				}
			},
			{
				"data": "2"
			},
			{
				"data": "3"
			},
			{
				render: function(data, type, row, meta) {
					if (row[4]) {
						return truncate(row[4], 5);
					} else {
						return `<button type="button" id="btn-qrcode" class="btn btn-link" data="` + row[0] + `">Show QRCode</button>`
					}
				},
				"searchable": false,
				"className": "text-center"
			},
			{
				"data": "5",
				"searchable": false
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('administrasi/kelola_bimbingan_prakerin/simpan/') ?>";
			var dataReq = new FormData(this);
			confirmSave().then(function(response) {
				if (response) {
					requests(dataUrl, "POST", dataReq).then(function(result) {
						var data = JSON.parse(result);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#edit', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_bimbingan_prakerin/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("bimbingan_prakerin_id=" + id), "GET", {}).then(function(results) {
						$("#frmData").modal({
							backdrop: "static",
							keyboard: false
						});
						spreadEdit(results, $("#Frm"));
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#hapus', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_bimbingan_prakerin/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("bimbingan_prakerin_id=" + id), "DELETE", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#btn-qrcode', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_bimbingan_prakerin/generate_qrcode?') ?>";
			var id = $(this).attr("data");
			requests(dataUrl + encodeURI("id=" + id), "GET", {}).then(function(results) {
				var data = JSON.parse(results);
				$("#modal-qrcode").modal({
					backdrop: "static",
					keyboard: false
				});
				$("#qrcode-images", $("#qrcode")).attr("src", data.qrcode)
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})
		});
	});
</script>