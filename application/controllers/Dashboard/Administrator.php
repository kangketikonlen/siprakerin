<?php defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends MY_Dashboard
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard/Administrator_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Dashboard";
		$data['Title'] = "Dashboard";
		$data['Breadcrumb'] = array();
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => str_replace("/", "/v_", $this->session->userdata('UrlDash')),
			'javascript' => 'dashboard/js/js_administrator'
		);
		$this->load->view('v_main', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('portal');
	}
}
