<?php defined('BASEPATH') or exit('No direct script access allowed');
class Informasi_instansi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Informasi_instansi_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Informasi Instansi";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_informasi_instansi",
			'javascript' => 'sistem/js/js_informasi_instansi'
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
		$config['upload_path'] = "./assets/images/uploads/";
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '10240';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$data = $this->input->post();

		if ($this->input->post('instansi_id') == "") {
			$nama_user = "Administrator " . strtoupper($this->input->post('instansi_nama'));
			$login_user = "adm" . str_replace(" ", "", strtolower($this->input->post('instansi_nama'))) . rand(10, 99);
			$pass_user = "PWD" . str_pad(rand(10, 99), 4, 0, STR_PAD_LEFT);

			$data['instansi_user'] = $login_user;
			$data['instansi_pass'] = $pass_user;
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			if ($this->upload->do_upload("instansi_logo")) {
				$upl = $this->upload->data();
				$data['instansi_logo'] = '/assets/images/uploads/' . $upl['file_name'];
			}
			if ($this->upload->do_upload("instansi_background")) {
				$upl = $this->upload->data();
				$data['instansi_background'] = '/assets/images/uploads/' . $upl['file_name'];
			}
			$instansi = $this->m->simpan($data);

			$data_user = array(
				'instansi_id' => $instansi,
				'level_id' => 2,
				'user_nama' => $nama_user,
				'user_login' => $login_user,
				'user_pass' => password_hash($pass_user, PASSWORD_BCRYPT),
				'created_by' => $this->session->userdata('nama')
			);

			$this->m->simpan_user($data_user);

			echo save_success();
		} else {
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');

			if ($this->upload->do_upload("instansi_logo")) {
				$upl = $this->upload->data();
				$data['instansi_logo'] = '/assets/images/uploads/' . $upl['file_name'];
			}
			if ($this->upload->do_upload("instansi_background")) {
				$upl = $this->upload->data();
				$data['instansi_background'] = '/assets/images/uploads/' . $upl['file_name'];
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

		echo delete_success();
	}

	public function options()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->m->options($searchTerm);
		echo json_encode($response);
	}
}
