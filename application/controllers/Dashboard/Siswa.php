<?php defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends MY_Dashboard
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard/Siswa_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Dashboard";
		$data['Title'] = "Dashboard";
		$data['Breadcrumb'] = array();
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => str_replace("/", "/v_", $this->session->userdata('UrlDash')),
			'javascript' => 'dashboard/js/js_siswa'
		);
		$data['peserta'] = $this->m->get_peserta();
		$data['industri'] = $this->m->get_industri();
		$data['is_presence'] = $this->m->get_kehadiran_today();
		$data['is_journal'] = $this->m->get_agenda_today();
		$this->load->view('v_main', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('https://sisfo.smkattaqwa05kebalen.sch.id');
	}
}
