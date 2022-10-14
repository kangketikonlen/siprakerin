<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_level extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Daftar_level_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Daftar Level";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_daftar_level",
			'javascript' => 'sistem/js/js_daftar_level'
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
		// Create slugs
		if ($data['level_type'] == "Dashboard") {
			$string = str_replace(' ', '_', $data['level_nama']);
			$data['level_url'] = 'dashboard/' . strtolower($string);
		} else {
			$data['level_url'] = "dashboard/landing";
		}
		if ($this->input->post('level_id') == "") {
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			$url = explode("/", $data['level_url']);

			$isFileExists = file_exists('./application/controllers/' . ucfirst($url[0]) . '/' . ucfirst($url[1] . '.php'));

			if (empty($isFileExists)) {
				$this->create_controller($url);
				$this->create_model($url);
				$this->create_view($url);
				$this->create_js($url);
			}

			$this->m->simpan($data);

			echo save_success();
		} else {
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');
			$this->m->edit($data);

			echo update_success();
		}
	}

	public function create_controller($url)
	{
		copy(
			'./samples/controllers/samples_dashboard.php',
			'./application/controllers/Dashboard/' . ucfirst($url[1]) . '.php'
		);

		$path_to_file = './application/controllers/Dashboard/' . ucfirst($url[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Dashboard/Sample_dashboard_model", 'Dashboard/' . ucfirst($url[1] . '_model'), $file_contents);
		$file_contents = str_replace("Sample_dashboard", ucfirst($url[1]), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_model($submodul)
	{
		copy(
			'./samples/models/samples_model.php',
			'./application/models/Dashboard/' . ucfirst($submodul[1]) . '_model.php'
		);

		$path_to_file = './application/models/Dashboard/' . ucfirst($submodul[1]) . '_model.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Samples_model", ucfirst($submodul[1] . '_model'), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_view($submodul)
	{
		copy(
			'./samples/views/v_samples_dashboard.php',
			'./application/views/dashboard/' . '/v_' . strtolower($submodul[1]) . '.php'
		);

		$path_to_file = './application/views/dashboard/v_' . ucfirst($submodul[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("samples/js/js_daftar_samples", strtolower($submodul[0] . '/js/js_' . $submodul[1]), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_js($submodul)
	{
		copy(
			'./samples/views/js/js_samples_dashboard.php',
			'./application/views/dashboard/js/js_' . strtolower($submodul[1]) . '.php'
		);

		$path_to_file = './application/views/dashboard/js/js_' . strtolower($submodul[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("samples/samples", strtolower($submodul[0] . '/' . $submodul[1]), $file_contents);
		file_put_contents($path_to_file, $file_contents);
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
