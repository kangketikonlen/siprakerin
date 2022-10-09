<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="google" content="notranslate">
	<link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.ico') ?>" type="image/x-icon">
	<link rel="icon" href="<?= base_url('assets/images/logo/favicon.ico') ?>" type="image/x-icon">
	<title><?= $Title ?> | <?= $this->session->userdata('AppInfo') ?></title>
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2/css/select2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-scroller/css/scroller.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-select/css/select.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/styles.css') ?>" />
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/dist/js/adminlte.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jszip/jszip.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-scroller/js/dataTables.scroller.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-select/js/dataTables.select.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
	<script src="<?= base_url('assets/dist/js/confirm.js?t=' . time()) ?>"></script>
	<script src="<?= base_url('assets/dist/js/requests.js?t=' . time()) ?>"></script>
	<script src="<?= base_url('assets/dist/js/scripts.js?t=' . time()) ?>"></script>
	<script src="<?= base_url('assets/dist/js/tables.js?t=' . time()) ?>"></script>
</head>