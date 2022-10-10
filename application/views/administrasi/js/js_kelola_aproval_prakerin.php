<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/list_data?') ?>";

		var listsColumn = [{
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1 + ".";
				}
			},
			{
				render: function(data, type, row, meta) {
					return `<button id='btn-bioprakerin' class='btn btn-link' data='` + row[1] + `'>` + row[2] + `</button>`;
				},
				"className": "text-center"
			},
			{
				render: function(data, type, row, meta) {
					return `<button id='btn-bioindustri' class='btn btn-link' data='` + row[0] + `'>` + row[3] + `</button>`;
				},
				"className": "text-center"
			},
			{
				render: function(data, type, row, meta) {
					if (row[4]) {
						return tgl_indo(row[4]);
					} else {
						return `<i>Belum diset</i>`;
					}
				}
			},
			{
				render: function(data, type, row, meta) {
					if (row[5]) {
						return tgl_indo(row[5]);
					} else {
						return `<i>Belum diset</i>`;
					}
				}
			},
			{
				render: function(data, type, row, meta) {
					if (row[6] == "Proses") {
						return `<button id='btn-approve' class='btn btn-block btn-flat btn-primary' data='` + row[0] + `'>Setujui</button>`;
					} else if (row[6] == "Disetujui") {
						return `<button id='btn-disapprove' class='btn btn-block btn-flat btn-info' data='` + row[0] + `' data-id='` + row[1] + `'>Batalkan</button>`;
					} else {
						return "-";
					}
				},
				"searchable": false,
				"className": "text-center"
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/set_approve/') ?>";
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

		$(document).on('click', '#btn-approve', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/get_data?') ?>";
			var id = $(this).attr("data");
			confirmApprove().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("biodata_industri_id=" + id), "GET", {}).then(function(results) {
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

		$(document).on('click', '#btn-disapprove', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/set_disapprove?') ?>";
			var dataReq = new FormData();
			dataReq.append("biodata_industri_id", $(this).attr("data"))
			dataReq.append("biodata_prakerin_id", $(this).attr("data-id"))
			confirmDisapprove().then(function(response) {
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

		$(document).on('click', '#btn-bioprakerin', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/get_data_prakerin?') ?>";
			var id = $(this).attr("data");
			requests(dataUrl + encodeURI("biodata_prakerin_id=" + id), "GET", {}).then(function(results) {
				$("#modal-bioprakerin").modal({
					backdrop: "static",
					keyboard: false
				});
				spreadEdit(results, $("#form-bioprakerin"));
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})
		});

		$(document).on('click', '#btn-bioindustri', function() {
			var dataUrl = "<?= base_url('administrasi/kelola_aproval_prakerin/get_data?') ?>";
			var id = $(this).attr("data");
			requests(dataUrl + encodeURI("biodata_industri_id=" + id), "GET", {}).then(function(results) {
				$("#modal-bioindustri").modal({
					backdrop: "static",
					keyboard: false
				});
				spreadEdit(results, $("#form-bioindustri"));
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})
		});
	});
</script>