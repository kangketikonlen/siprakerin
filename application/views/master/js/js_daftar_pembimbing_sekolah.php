<script>
	$(document).ready(function() {
		// option filter menu
		var staffMenu = $('#pembimbing_sekolah_user_login');
		var optUrl = "<?= base_url('master/daftar_pembimbing_sekolah/options/') ?>";
		createSelect2(staffMenu, "Pilih Staff");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(staffMenu, results);
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		var tableUrl = "<?= base_url('master/daftar_pembimbing_sekolah/list_data?') ?>";

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
				"data": "3",
				"searchable": false,
				"className": "text-center"
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('master/daftar_pembimbing_sekolah/simpan/') ?>";
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

		$(document).on('click', '#hapus', function() {
			var dataUrl = "<?= base_url('master/daftar_pembimbing_sekolah/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("pembimbing_sekolah_id=" + id), "DELETE", {}).then(function(results) {
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