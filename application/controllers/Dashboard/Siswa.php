<?php defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends MY_Dashboard
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard/Siswa_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Dashboard";
		$data['Title'] = "Dashboard";
		$data['Breadcrumb'] = array();
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => str_replace("/", "/v_", $this->session->userdata('UrlDash')),
			'javascript' => 'dashboard/js/js_siswa'
		);
		$this->load->view('v_main', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('portal');
	}
}
