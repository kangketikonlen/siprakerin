<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_user extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Daftar_user_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Daftar User";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_daftar_user",
			'javascript' => 'sistem/js/js_daftar_user'
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
		if ($this->input->post('user_id') == "") {
			$data['user_pass'] = password_hash($data['user_pass_baru'], PASSWORD_BCRYPT);
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			unset($data['user_pass_baru']);

			$this->m->simpan($data);

			echo save_success();
		} else {
			if ($this->input->post('user_pass_baru') != "") {
				$data['user_pass'] = password_hash($data['user_pass_baru'], PASSWORD_BCRYPT);
				$data['updated_by'] = $this->session->userdata('nama');
				$data['updated_date'] = date('Y-m-d H:i:s');

				unset($data['user_pass_baru']);
			} else {
				$data['updated_by'] = $this->session->userdata('nama');
				$data['updated_date'] = date('Y-m-d H:i:s');

				unset($data['user_pass_baru']);
			}

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
		$pesan = array(
			'warning' => 'Berhasil!',
			'kode' => 'success',
			'pesan' => 'Data berhasil di hapus!'
		);
		echo json_encode($pesan);
	}

	public function options()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->m->options($searchTerm);
		echo json_encode($response);
	}
}
