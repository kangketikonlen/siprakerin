<?php defined('BASEPATH') or exit('No direct script access allowed');
class Digisign extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if ($isLogin) {
			redirect(base_url($this->session->userdata('UrlDash')));
		} else {
			$this->load->model('Digisign_model', 'm');
		}
	}

	public function index()
	{
		$data['Title'] = "Digisign";
		$data['Template'] = "templates/public";
		$data['Components'] = array(
			'main' => "/v_register",
			'header' => $data['Template'] . "/components/v_header_register",
			'content' => "v_digisign"
		);
		$data['Info'] = $this->m->get_sysinfo();
		$data['Instansi'] = $this->m->get_instansi();
		$this->load->view('v_main', $data);
	}

	public function get_data()
	{
		$data = $this->m->get_data();
		if (!empty($data)) {
			echo json_encode($data);
		}
	}

	public function get_data_agenda()
	{
		$data = $this->m->get_data_agenda();
		if (!empty($data)) {
			echo json_encode($data);
		}
	}

	public function simpan()
	{
		$this->load->library('user_agent');

		$data['histori_kehadiran_validator'] = hash_hmac('sha256', $this->agent->agent_string(), 'kangketik2020.woke');
		$data['updated_by'] = "Pembimbing Industri";
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->simpan($data);

		echo save_success();
	}

	public function simpan_agenda()
	{
		$this->load->library('user_agent');

		$data['histori_agenda_kegiatan_validator'] = hash_hmac('sha256', $this->agent->agent_string(), 'kangketik2020.woke');
		$data['updated_by'] = "Pembimbing Industri";
		$data['updated_date'] = date('Y-m-d H:i:s');
		$this->m->simpan_agenda($data);

		echo save_success();
	}
}
