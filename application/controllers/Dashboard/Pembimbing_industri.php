<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pembimbing_industri extends MY_Dashboard
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard/Pembimbing_industri_model', 'm');
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
			'javascript' => 'dashboard/js/js_pembimbing_industri'
		);
		$data['peserta'] = $this->m->get_peserta();
		$this->load->view('v_main', $data);
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		if (!empty($result)) {
			echo json_encode($result);
		}
	}

	public function simpan()
	{
		$data = $this->input->post();
		if (empty($data['nilai_prakerin_id'])) {
			$data['biodata_prakerin_id'] = $this->session->userdata('id');
			$data['nilai_prakerin_validator'] = $this->session->userdata('validator');
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');
			$this->m->simpan($data);

			echo save_success();
		} else {
			$data['nilai_prakerin_validator'] = $this->session->userdata('validator');
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');
			$this->m->edit($data);

			echo update_success();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('portal');
	}
}
