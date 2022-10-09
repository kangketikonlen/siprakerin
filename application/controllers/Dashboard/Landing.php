<?php defined('BASEPATH') or exit('No direct script access allowed');
class Landing extends MY_Dashboard
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard/Landing_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Dashboard";
		$data['Title'] = "Dashboard";
		$data['Breadcrumb'] = array();
		$data['Template'] = "templates/private";
		if (empty($this->session->userdata('level_tmp'))) {
			$data['Components'] = array(
				'main' => "/v_private_landing",
				'header' => $data['Template'] . "/components/v_header",
				'navbar' => $data['Template'] . "/components/v_navbar_landing",
				'footer' => $data['Template'] . "/components/v_footer",
				'javascript' => 'dashboard/js/js_administrator'
			);
		} else {
			$data['Components'] = array(
				'main' => "/v_private",
				'header' => $data['Template'] . "/components/v_header",
				'sidebar' => $data['Template'] . "/components/v_sidebar",
				'navbar' => $data['Template'] . "/components/v_navbar",
				'footer' => $data['Template'] . "/components/v_footer",
				'content' => str_replace("/", "/v_", $this->session->userdata('UrlDash')),
				'javascript' => 'dashboard/js/js_administrator'
			);
		}
		$this->load->view('v_main', $data);
	}

	public function akses($level)
	{
		$this->session->set_userdata('level_tmp', $this->session->userdata('level_id'));
		$this->session->set_userdata('url_tmp', $this->session->userdata('UrlDash'));
		$this->session->unset_userdata('level_id');
		$this->session->unset_userdata('UrlDash');
		$this->session->set_userdata('level_id', $level);
		$this->session->set_userdata('UrlDash', $this->input->get('url'));
		redirect('portal');
	}

	public function reset_akses()
	{
		$this->session->unset_userdata('level_id');
		$this->session->set_userdata('level_id', $this->session->userdata('level_tmp'));
		$this->session->set_userdata('UrlDash', $this->session->userdata('url_tmp'));
		$this->session->unset_userdata('level_tmp');
		$this->session->unset_userdata('url_tmp');
		redirect('portal');
	}

	public function update_database()
	{
		$this->load->library('migration');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('portal');
	}
}
