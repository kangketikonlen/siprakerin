<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('administrasi/kelola_agenda_kegiatan/list_data?') ?>";

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
				render: function(data, type, row, meta) {
					if (row[3]) {
						return truncate(row[3], 5);
					} else {
						return `<button type="button" id="btn-qrcode" class="btn btn-link" data="` + row[0] + `">Show QRCode</button>`
					}
				},
				"searchable": false,
				"className": "text-center"
			},
			{
				"data": "4",
				"searchable": false,
				"className": "text-center"
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('administrasi/kelola_agenda_kegiatan/simpan/') ?>";
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
			var dataUrl = "<?= base_url('administrasi/kelola_agenda_kegiatan/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("histori_agenda_kegiatan_id=" + id), "GET", {}).then(function(results) {
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
			var dataUrl = "<?= base_url('administrasi/kelola_agenda_kegiatan/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("histori_agenda_kegiatan_id=" + id), "DELETE", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#btn-qrcode', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_agenda_kegiatan/generate_qrcode?') ?>";
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