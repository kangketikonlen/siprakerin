<?php defined('BASEPATH') or exit('No direct script access allowed');
class Samples_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_folder/Samples_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Samples Root";
		$data['Title'] = "Samples Title";
		$data['Breadcrumb'] = array('Samples');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "samples_view/v_samples",
			'javascript' => 'samples/js/js_daftar_samples'
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
		if (empty($data['samples_id'])) {
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');
			$this->m->simpan($data);

			echo save_success();
		} else {
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');
			$this->m->edit($data);

			echo update_success();
		}
	}

	public function get_data()
	{
		$result = $this->m->get_data();
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
		$response = $this->m->options();
		echo json_encode($response);
	}
}
