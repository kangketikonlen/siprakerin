<?php defined('BASEPATH') or exit('No direct script access allowed');
class Informasi_sistem extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Informasi_sistem_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Informasi Sistem";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_informasi_sistem",
			'javascript' => 'sistem/js/js_informasi_sistem'
		);
		$this->load->view('v_main', $data);
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function simpan()
	{
		$data = $this->input->post();
		unset($data['info_status_sosmed_control']);

		$config['upload_path'] = "./assets/images/sponsor/";
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '10240';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->input->post('info_id') == "") {
			if ($this->upload->do_upload("info_sponsor_image")) {
				$upl = $this->upload->data();
				$data['info_sponsor_image'] = '/assets/images/sponsor/' . $upl['file_name'];
			}
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
}
