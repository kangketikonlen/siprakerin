<script>
	$(document).ready(function() {
		// option filter menu
		var filterMenu = $("#filter_menu_id");
		var optUrl = "<?= base_url('sistem/menu_utama/options/') ?>";
		createSelect2(filterMenu, "Filter menu");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(filterMenu, results);
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		var tableUrl = "<?= base_url('sistem/hak_akses_menu/list_data/') ?>";

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
				"data": "4"
			},
			{
				"data": "5",
				"searchable": false
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		filterMenu.change(function() {
			$("#dtTable").DataTable().ajax.url(tableUrl + "?menu_id=" + $(this).val()).load();
		});

		$(document).on('click', '#edit', function() {
			var dataUrl = "<?= base_url('sistem/hak_akses_menu/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("submenu_id=" + id), "GET", {}).then(function(results) {
						$("#frmData").modal({
							backdrop: "static",
							keyboard: false
						});
						spreadSubmenu(results, $("#Frm"));
					})
				}
			})
		});

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/hak_akses_menu/simpan/') ?>";
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

		$('input[type=checkbox]').click(function() {
			if ($(this).is(':checked')) {
				$("#submenu_roles").val($("#submenu_roles").val() + "," + $(this).val());
			} else {
				$("#submenu_roles").val($("#submenu_roles").val().replace("," + $(this).val(), ""));
			}
		});

		$(document).on('click', '#setup', function() {
			var dataUrl = "<?= base_url('sistem/hak_akses_menu/get_data_menu?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("menu_id=" + id), "GET", {}).then(function(results) {
						$("#frmSetup").modal({
							backdrop: "static",
							keyboard: false
						});
						spreadMenu(results, $("#FrmSetup"));
					})
				}
			})
		});

		$('#FrmSetup').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/hak_akses_menu/simpan_menu/') ?>";
			var dataReq = new FormData(this);
			confirmSave().then(function(response) {
				if (response) {
					requests(dataUrl, "POST", dataReq).then(function(result) {
						var data = JSON.parse(result);
						pesan(data.warning, data.kode, data.pesan, true);
						$('#frmSetup').modal('hide');
					})
				}
			})
		});

		$('input[type=checkbox]').click(function() {
			if ($(this).is(':checked')) {
				$("#menu_roles").val($("#menu_roles").val() + "," + $(this).val());
			} else {
				$("#menu_roles").val($("#menu_roles").val().replace("," + $(this).val(), ""));
			}
		});
	});
</script>