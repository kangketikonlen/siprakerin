<script>
	$(document).ready(function() {
		// option filter menu
		var levelMenu = $('#level_id');
		var optUrl = "<?= base_url('sistem/daftar_level/options/') ?>";
		createSelect2(levelMenu, "Filter level");
		requests(optUrl, "GET", {}).then(function(results) {
			populateOption(levelMenu, results);
		}).catch(function(err) {
			pesan("Error " + err.status, "error", "Request " + err.statusText);
		});

		var tableUrl = "<?= base_url('sistem/daftar_user/list_data/') ?>";

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

		$('#Frm').submit(function(e) {
			e.preventDefault();
			var dataUrl = "<?= base_url('sistem/daftar_user/simpan/') ?>";
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
			var dataUrl = "<?= base_url('sistem/daftar_user/get_data?') ?>";
			var id = $(this).attr("data");
			confirmUpdate().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("user_id=" + id), "GET", {}).then(function(results) {
						$("#frmData").modal({
							backdrop: "static",
							keyboard: false
						});
						spreadEdit(results, $("#Frm"));
					})
				}
			})
		});

		$(document).on('click', '#hapus', function() {
			var dataUrl = "<?= base_url('sistem/daftar_user/hapus?') ?>";
			var id = $(this).attr("data");
			confirmDelete().then(function(response) {
				if (response) {
					requests(dataUrl + encodeURI("user_id=" + id), "DELETE", {}).then(function(results) {
						var data = JSON.parse(results);
						pesan(data.warning, data.kode, data.pesan, true);
					})
				}
			})
		});

		$(document).on('click', '#random-pass', function() {
			swal({
				title: "Anda Yakin Ingin Membuat Password Acak?",
				text: "Klik CANCEL jika ingin membatalkan!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if (Oke) {
					var pass = "PWD" + Math.floor(Math.random() * (999 - 100)) + 100;
					$("#user_pass_baru").val(pass);
					$("#user_pass_baru").attr('type', 'text');
				} else {
					swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});

	});
</script>