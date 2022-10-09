<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.ico') ?>" type="image/x-icon">
	<link rel="icon" href="<?= base_url('assets/images/logo/favicon.ico') ?>" type="image/x-icon">
	<title><?= strtoupper($Title) ?> - <?= $this->m->get_instansi()->instansi_nama ?></title>
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css?v=3.2.0') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/login.css?t=' . time()) ?>">
	<style>
		.banner-sec {
			background: url(<?= base_url($this->m->get_instansi()->instansi_background) ?>) no-repeat left bottom;
			background-size: cover;
			min-height: 500px;
			border-radius: 0 10px 10px 0;
			padding: 0;
		}
	</style>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js?v=3.2.0') ?>"></script>
	<script src="<?= base_url('assets/plugins/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('assets/dist/js/confirm.js?t=' . time()) ?>"></script>
	<script src="<?= base_url('assets/dist/js/requests.js?t=' . time()) ?>"></script>
	<script src="<?= base_url('assets/dist/js/scripts.js?t=' . time()) ?>"></script>
</head>