<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setup_biodata_siswa extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan/Setup_biodata_siswa_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Setup Biodata Siswa";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_setup_biodata_siswa",
			'javascript' => 'pengaturan/js/js_setup_biodata_siswa'
		);
		$this->load->view('v_main', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->edit($data);

		echo update_success();
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function option_kelas()
	{
		$response = $this->m->option_kelas();
		echo json_encode($response);
	}
}
