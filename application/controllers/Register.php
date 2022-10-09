<?php defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if ($isLogin) {
			redirect(base_url($this->session->userdata('UrlDash')));
		} else {
			$this->load->model('Register_model', 'm');
		}
	}

	public function index()
	{
		$data['Title'] = "Register";
		$data['Template'] = "templates/public";
		$data['Components'] = array(
			'main' => "/v_register",
			'header' => $data['Template'] . "/components/v_header_register",
			'content' => "v_register"
		);
		$data['Info'] = $this->m->get_sysinfo();
		$data['Instansi'] = $this->m->get_instansi();
		$this->load->view('v_main', $data);
	}

	public function get_data()
	{
		$data = $this->m->get_data();
		if (!empty($data)) {
			$data['biodata_prakerin_nama'] = $data['siswa_nama'];
			echo json_encode($data);
		}
	}

	public function simpan()
	{
		$data = $this->input->post();
		$is_exists = $this->m->check_data();
		if (empty($is_exists)) {
			$data['created_by'] = $this->input->post('biodata_prakerin_nama');
			$data['created_date'] = date('Y-m-d H:i:s');
			$this->m->simpan($data);

			echo save_success();
		} else {
			echo custom_failed("Data sudah ada.");
		}
	}

	public function validator()
	{
		$data = $this->m->check_data();
		if (!empty($data)) {
			$this->simpan_session($data);
			redirect(base_url());
		} else {
			redirect(base_url('register?user=' . $this->input->get('username')));
		}
	}

	public function simpan_session($data)
	{
		$session = array(
			'id' => $data['biodata_prakerin_id'],
			'level_id' => 3,
			'nama' => $data['biodata_prakerin_nama'],
			'Instansi' => $this->m->get_instansi()->instansi_id,
			'AppLogo' => $this->m->get_instansi()->instansi_logo,
			'AppInfo' => $this->m->get_sysinfo()->info_name . ' ' . $this->m->get_instansi()->instansi_nama,
			'DevInfo' => $this->m->get_sysinfo()->info_devs,
			'UrlDev' => $this->m->get_sysinfo()->info_devs_url,
			'UrlDash' => 'dashboard/siswa',
			'LoggedIn' => TRUE
		);
		$this->session->set_userdata($session);
	}
}
