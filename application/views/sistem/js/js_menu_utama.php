<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('sistem/menu_utama/list_data/') ?>";

		var listsColumn = [{
				"data": "1"
			},
			{
				"data": "2"
			},
			{
				"data": "3"
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/menu_utama/simpan/') ?>";
			var dataReq = new FormData(this);
			confirmSave().then(function(status) {
				if (status) {
					requests(dataUrl, "POST", dataReq).then(function(results) {
						var msg = JSON.parse(results);
						pesan(msg.warning, msg.kode, msg.pesan, true);
					}).catch(function(err) {
						pesan("Error " + err.status, "error", "Request " + err.statusText);
					});
				}
			})
		});
	});
</script>