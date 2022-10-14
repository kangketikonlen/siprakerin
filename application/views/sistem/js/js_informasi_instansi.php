<script>
	bsCustomFileInput.init();

	var tableUrl = "<?= base_url('sistem/informasi_instansi/list_data/') ?>";

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
			"data": "3"
		},
		{
			"data": "4"
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
		var dataUrl = "<?= base_url('sistem/informasi_instansi/simpan/') ?>";
		var dataReq = new FormData(this);
		confirmSave().then(function(response) {
			if (response) {
				requests(dataUrl, "POST", dataReq).then(function(result) {
					var data = JSON.parse(result);
					pesan(data.warning, data.kode, data.pesan, true);
				})
			}
		})
	});

	$(document).on('click', '#edit', function() {
		var dataUrl = "<?= base_url('sistem/informasi_instansi/get_data?') ?>";
		var id = $(this).attr("data");
		confirmUpdate().then(function(response) {
			if (response) {
				requests(dataUrl + encodeURI("instansi_id=" + id), "GET", {}).then(function(results) {
					$("#frmData").modal({
						backdrop: "static",
						keyboard: false
					});
					spreadEdit(results, $("#Frm"));
				})
			}
		})
	});

	$(document).on('click', '#hapus', function() {
		var dataUrl = "<?= base_url('sistem/informasi_instansi/hapus?') ?>";
		var id = $(this).attr("data");
		confirmDelete().then(function(response) {
			if (response) {
				requests(dataUrl + encodeURI("instansi_id=" + id), "DELETE", {}).then(function(results) {
					var data = JSON.parse(results);
					pesan(data.warning, data.kode, data.pesan, true);
				})
			}
		})
	});

	$('#FrmUnggah').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('sistem/informasi_instansi/import/') ?>";
		var dataReq = new FormData(this);
		importRequest(dataUrl, dataReq);
	});
</script>