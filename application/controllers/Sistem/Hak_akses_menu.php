<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses_menu extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Hak_akses_menu_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Hak Akses Menu";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_hak_akses_menu",
			'javascript' => 'sistem/js/js_hak_akses_menu'
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}

	public function simpan()
	{
		$data = $this->input->post();
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		unset($data['submenu_roles_checked']);

		$this->m->edit($data);

		echo update_success();
	}

	public function simpan_menu()
	{
		$data = $this->input->post();
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		unset($data['menu_roles_checked']);

		$this->m->edit_menu($data);

		echo save_success();
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function get_data_menu()
	{
		$result = $this->m->get_data_menu();
		echo json_encode($result);
	}

	public function hapus()
	{
		$data = array(
			'deleted' => TRUE,
			'updated_by' => $this->session->userdata('nama'),
			'updated_date' => date('Y-m-d H:i:s')
		);
		$this->m->hapus($data);
		echo delete_success();
	}

	public function options()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->m->options($searchTerm);
		echo json_encode($response);
	}
}
