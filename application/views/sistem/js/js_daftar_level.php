<script>
	$(document).ready(function() {
		var typeMenu = $("#level_type");
		createSelect2(typeMenu, "Pilih tipe halaman");

		var tableUrl = "<?= base_url('sistem/daftar_level/list_data/') ?>";

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
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/daftar_level/simpan/') ?>";
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

		$(document).on('click', '#edit', function() {
			$("#frmData").modal('show');
			var dataUrl = "<?= base_url('sistem/daftar_level/get_data/') ?>";
			var reqData = {
				level_id: $(this).attr("data")
			};
			requestEdit(dataUrl, reqData);
		});

		$(document).on('click', '#hapus', function() {
			var dataUrl = "<?= base_url('sistem/daftar_level/hapus/') ?>";
			var dataReq = {
				level_id: $(this).attr("data")
			};
			saveRequest(dataUrl, dataReq);
		});
	});
</script>