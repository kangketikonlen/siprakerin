<script>
	$(document).ready(function() {
		$(document).ready(function() {
			var dataUrl = "<?= base_url('pengaturan/setup_biodata_industri/get_data') ?>";
			requests(dataUrl, "GET", {}).then(function(results) {
				spreadEdit(results, $("#Frm"));
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})

			$('#Frm').submit(function(e) {
				e.preventDefault();
				var dataUrl = "<?= base_url('pengaturan/setup_biodata_industri/simpan/') ?>";
				var dataReq = new FormData(this);
				confirmSave().then(function(response) {
					if (response) {
						requests(dataUrl, "POST", dataReq).then(function(result) {
							var data = JSON.parse(result);
							pesan(data.warning, data.kode, data.pesan);
						}).catch(function(e) {
							pesan("Error " + e.status, "error", e.statusText, true);
						})
					}
				})
			});
		});
	});
</script>