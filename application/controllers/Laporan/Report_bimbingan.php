<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report_bimbingan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan/Report_bimbingan_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Laporan";
		$data['Title'] = "Report Bimbingan";
		$data['Breadcrumb'] = array('Laporan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "laporan/v_report_bimbingan",
			'javascript' => 'laporan/js/js_report_bimbingan'
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}
}
