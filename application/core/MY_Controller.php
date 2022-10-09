<?php defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'global');
		$this->check_akses();
		$this->check_session();
	}

	private function check_session()
	{
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			if (empty($this->session->userdata('pesan'))) {
				$this->session->set_userdata('pesan', 'Sesi anda habis, silahkan melakukan login kembali!');
			}
			redirect('portal');
		}
	}

	private function check_akses()
	{
		$slug = $this->uri->segment(1) . '/' . $this->uri->segment(2);
		$submenu = $this->global->get_single_submenu($slug);
		$level = $this->session->userdata('level_id');
		$roles = explode(",", $submenu->submenu_roles);
		if (!array_search($level, $roles)) {
			$this->session->set_userdata('LoggedIn', false);
			$this->session->set_userdata('pesan', 'Anda mengakses modul yang tidak di izinkan!');
			redirect('portal');
		}
	}
}

class MY_Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->session->unset_userdata('pesan');
		$this->load->model('Dashboard_model', 'global');
		$this->check_session();
	}

	private function check_session()
	{
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			if (empty($this->session->userdata('pesan'))) {
				$this->session->set_userdata('pesan', 'Sesi anda habis, silahkan melakukan login kembali!');
			}
			redirect('portal');
		}
	}
}
