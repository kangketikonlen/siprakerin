<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('master/daftar_admin/list_data?') ?>";

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
				"data": "4",
				"searchable": false
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('master/daftar_admin/simpan/') ?>";
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
			var dataUrl = "<?= base_url('master/daftar_admin/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("user_id=" + id), "GET", {}).then(function(results) {
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
			var dataUrl = "<?= base_url('master/daftar_admin/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("user_id=" + id), "DELETE", {}).then(function(results) {
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