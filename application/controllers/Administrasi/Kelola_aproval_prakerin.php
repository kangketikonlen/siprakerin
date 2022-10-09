<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kelola_aproval_prakerin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrasi/Kelola_aproval_prakerin_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Administrasi";
		$data['Title'] = "Kelola Aproval Prakerin";
		$data['Breadcrumb'] = array('Administrasi');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "administrasi/v_kelola_aproval_prakerin",
			'javascript' => 'administrasi/js/js_kelola_aproval_prakerin'
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function get_data_prakerin()
	{
		$result = $this->m->get_data_prakerin();
		echo json_encode($result);
	}


	public function set_approve()
	{
		$data['biodata_prakerin_status'] = "Disetujui";
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->edit_prakerin($data);

		$data = $this->input->post();
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->edit($data);

		echo update_success();
	}

	public function set_disapprove()
	{
		$data['biodata_prakerin_status'] = "Menunggu Persetujuan";
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->edit_prakerin($data);

		$data = $this->input->post();
		$data['biodata_industri_tanggal_mulai'] = NULL;
		$data['biodata_industri_tanggal_selesai'] = NULL;
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->edit($data);

		echo update_success();
	}
}
