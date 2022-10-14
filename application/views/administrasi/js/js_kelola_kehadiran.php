<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('administrasi/kelola_kehadiran/list_data?') ?>";

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
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$(document).on('click', '#btn-masuk', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_kehadiran/simpan_kehadiran') ?>";
			confirmAbsenMasuk().then(function(response) {
				if (response) {
					requests(dataUrl, "POST", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#btn-pulang', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_kehadiran/update_kehadiran') ?>";
			confirmAbsenPulang().then(function(response) {
				if (response) {
					requests(dataUrl, "POST", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#btn-qrcode', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_kehadiran/generate_qrcode?') ?>";
			var id = $(this).attr("data");
			requests(dataUrl + encodeURI("id=" + id), "GET", {}).then(function(results) {
				var data = JSON.parse(results);
				$("#frmData").modal({
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