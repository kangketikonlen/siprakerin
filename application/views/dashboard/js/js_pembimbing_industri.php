<script>
	$(document).ready(function() {
		var dataUrl = "<?= base_url('dashboard/pembimbing_industri/get_data') ?>";
		requests(dataUrl, "GET").then(function(results) {
			if (results) {
				var data = JSON.parse(results);
				if (data.nilai_prakerin_validator) {
					$("#validator").html(`Signed, <strong>` + truncate(data.nilai_prakerin_validator, 10) + `</strong>`);
				}
				spreadEdit(results, $("#Frm"));
			}
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('dashboard/pembimbing_industri/simpan/') ?>";
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
</script>