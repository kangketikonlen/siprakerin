<script>
	$(document).ready(function() {
		// option filter menu
		var kelasMenu = $('#biodata_prakerin_kelas');
		var optUrl = "<?= base_url('pengaturan/setup_biodata_siswa/option_kelas/') ?>";
		createSelect2(kelasMenu, "Pilih kelas");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(kelasMenu, results);
			loadData();
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		function loadData() {
			var dataUrl = "<?= base_url('pengaturan/setup_biodata_siswa/get_data') ?>";
			requests(dataUrl, "GET", {}).then(function(results) {
				spreadEdit(results, $("#Frm"));
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})
		}

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('pengaturan/setup_biodata_siswa/simpan/') ?>";
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
	});
</script>