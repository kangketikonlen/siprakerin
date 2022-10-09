<script>
	$(document).ready(function() {
		var tableUrl = "<?= base_url('master/daftar_biodata_siswa/list_data?') ?>";

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

		$(document).on('click', '#btn-detail', function() {
			var dataUrl = "<?= base_url('master/daftar_biodata_siswa/get_data?') ?>";
			var id = $(this).attr("data");
			requests(dataUrl + encodeURI("biodata_prakerin_id=" + id), "GET", {}).then(function(results) {
				$("#frmData").modal({
					backdrop: "static",
					keyboard: false
				});
				spreadEdit(results, $("#Frm"));
			}).catch(function(e) {
				pesan("Error " + e.status, "error", e.statusText);
			})
		});
	});
</script>