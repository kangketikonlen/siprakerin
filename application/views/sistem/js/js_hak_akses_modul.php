<script>
	var tableUrl = "<?= base_url('sistem/hak_akses_modul/list_data/') ?>";

	var listsColumn = [{
			render: function(data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1 + ".";
			}
		},
		{
			"data": "1"
		},
		{
			"data": "2",
			"searchable": false
		}
	];

	dtTable(tableUrl, listsColumn, {
		"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
	});

	$('input[type=checkbox]').click(function() {
		if ($(this).is(':checked')) {
			$("#level_show_landing").val($("#level_show_landing").val() + "," + $(this).val());
		} else {
			$("#level_show_landing").val($("#level_show_landing").val().replace("," + $(this).val(), ""));
		}
	});

	$('#Frm').submit(function(e) {
		e.preventDefault();
		var dataUrl = "<?= base_url('sistem/hak_akses_modul/simpan/') ?>";
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
		var dataUrl = "<?= base_url('sistem/hak_akses_modul/get_data?') ?>";
		var id = $(this).attr("data");
		confirmUpdate().then(function(response) {
			if (response) {
				requests(dataUrl + encodeURI("level_id=" + id), "GET", {}).then(function(results) {
					$("#frmData").modal({
						backdrop: "static",
						keyboard: false
					});
					spreadLanding(results, $("#Frm"));
				})
			}
		});
	});
</script>