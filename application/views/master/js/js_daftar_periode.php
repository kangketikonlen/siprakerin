<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('master/daftar_periode/list_data?') ?>";

		var listsColumn = [{
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1 + ".";
				}
			},
			{
				"data": "1"
			},
			{
				"data": "2"
			},
			{
				render: function(data, type, row, meta) {
					if (row[2] == "Tidak Aktif") {
						button = "<button id='aktifkan' class='m-1 btn btn-sm btn-success' data='" + row[0] + "'><i class='fa fa-play'></i></button>";
					} else {
						button = "<button id='nonaktifkan' class='m-1 btn btn-sm btn-warning' data='" + row[0] + "'><i class='fa fa-pause'></i></button>";
					}
					return button + row[3];
				},
				"searchable": false
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('master/daftar_periode/simpan/') ?>";
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
			var dataUrl = "<?= base_url('master/daftar_periode/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("periode_id=" + id), "GET", {}).then(function(results) {
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

		$(document).on('click', '#aktifkan', function() {
			var dataUrl = "<?= base_url('master/daftar_periode/aktifkan?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("periode_id=" + id), "POST", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#nonaktifkan', function() {
			var dataUrl = "<?= base_url('master/daftar_periode/nonaktifkan?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("periode_id=" + id), "POST", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});

		$(document).on('click', '#hapus', function() {
			var dataUrl = "<?= base_url('master/daftar_periode/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("periode_id=" + id), "DELETE", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan);
					}).catch(function(e) {
						pesan("Error " + e.status, "error", e.statusText);
					})
				}
			})
		});
	});
</script>