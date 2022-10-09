<script>
	var dataUrl = "<?= base_url('sistem/informasi_sistem/get_data/') ?>";
	requests(dataUrl, "GET", {}).then(function(results) {
		spreadEdit(results, $('#Frm'));
	}).catch(function(err) {
		pesan("Error " + err.status, "error", "Request " + err.statusText);
	});

	var checkExist = setInterval(function() {
		if ($("#info_status_sosmed").val() == 1) {
			$("#info_status_sosmed_control").prop('checked', true);
		}
	}, 100)

	$("#info_status_sosmed_control").change(function() {
		if (this.checked) {
			$("#info_status_sosmed").val(1);
		} else {
			$("#info_status_sosmed").val(0);
		}
	});

	$('#Frm').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('sistem/informasi_sistem/simpan/') ?>";
		var dataReq = new FormData(this);
		confirmSave().then(function(status) {
			if (status) {
				requests(dataUrl, "POST", dataReq).then(function(results) {
					var msg = JSON.parse(results);
					pesan(msg.warning, msg.kode, msg.pesan);
				}).catch(function(err) {
					pesan("Error " + err.status, "error", "Request " + err.statusText);
				});
			}
		})
	});
</script>