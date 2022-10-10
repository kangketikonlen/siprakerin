<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php $this->load->view($Components['header']); ?>

<body style="background-color: #334756">
	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="<?= base_url($this->m->get_instansi()->instansi_logo) ?>" alt="Preloader-logo" height="120" width="120">
	</div>
	<?php $this->load->view($Components['content']); ?>
</body>

</html>