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

		var tableUrl = "<?= base_url('sistem/submenu/list_data?') ?>";

		var listsColumn = [{
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
				"data": "5"
			}
		];

		dtTable(tableUrl, listsColumn, {
			"<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
		});

		filterMenu.change(function() {
			var id = $(this).val();
			$("#dtTable").DataTable().ajax.url(tableUrl + encodeURI("menu_id=" + id)).load();
		});

		// option menu
		var menuID = $("#menu_id");
		var optUrl = "<?= base_url('sistem/menu_utama/options/') ?>";
		createSelect2(menuID, "Pilih menu");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(menuID, results);
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		$('#frmData').on('show.bs.modal', function(event) {
			var modal = $(this)
			var data = filterMenu.val();
			modal.find('#menu_id').val(data).change();
		})

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/submenu/simpan/') ?>";
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
	});
</script>