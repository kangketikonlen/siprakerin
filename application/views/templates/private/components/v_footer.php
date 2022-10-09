<script>
	$(document).on('click', '#updateDB', function() {
		swal({
			title: "Update database ke versi terbaru?",
			text: "",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				$.ajax({
					type: "GET",
					url: "<?= base_url('dashboard/landing/update_database/') ?>",
					timeout: 5000,
					beforeSend: function(xhr) {
						$("#overlay").fadeIn(300);
					},
					success: function(response) {
						$("#overlay").fadeOut(300);
						var data = JSON.parse(response);
						swal(data.warning, data.pesan, data.kode).then((value) => {
							if (data.kode == "success") {
								$("#overlay").fadeOut(300)
							}
						})
					},
					error: function(xhr, status, error) {
						swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
							$("#overlay").fadeOut(300);
						})
					}
				})
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					location.reload();
				})
			}
		})
	});
</script>
<footer class="main-footer">
	<strong>Copyright &copy; <?= date('Y') ?> <a href="<?= $this->session->userdata('UrlDev') ?>"><?= $this->session->userdata('DevInfo') ?></a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> <?= CI_VERSION ?> | Halaman dimuat dalam {elapsed_time} detik
	</div>
</footer>