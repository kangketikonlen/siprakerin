<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setup_biodata_industri extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan/Setup_biodata_industri_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Setup Biodata Industri";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_setup_biodata_industri",
			'javascript' => 'pengaturan/js/js_setup_biodata_industri'
		);
		$this->load->view('v_main', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();
		if (empty($data['biodata_industri_id'])) {
			$data['biodata_prakerin_id'] = $this->session->userdata('id');
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
}
