<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_pembimbing_sekolah extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master/Daftar_pembimbing_sekolah_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Master";
		$data['Title'] = "Daftar Pembimbing Sekolah";
		$data['Breadcrumb'] = array('Master');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "master/v_daftar_pembimbing_sekolah",
			'javascript' => 'master/js/js_daftar_pembimbing_sekolah'
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
		$is_exists = $this->m->check_data();
		if (empty($is_exists)) {
			$staff = $this->m->get_data_staff();
			$data['pembimbing_sekolah_nama'] = $staff['staff_nama'];
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');
			$this->m->simpan($data);

			echo save_success();
		} else {
			echo custom_failed("Staff sudah terdaftar!");
		}
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function hapus()
	{
		$this->m->hapus();
		echo delete_success();
	}

	public function options()
	{
		$response = $this->m->options();
		echo json_encode($response);
	}
}
