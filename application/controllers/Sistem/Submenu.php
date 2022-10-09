<?php defined('BASEPATH') or exit('No direct script access allowed');
class Submenu extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Submenu_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Submenu";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_submenu",
			'javascript' => 'sistem/js/js_submenu'
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
		// create slug
		$menu = $this->m->search_menu($data['menu_id']);
		$string = str_replace(' ', '_', $data['submenu_root']);
		$data['submenu_url'] = strtolower($menu->menu_nama) . '/' . strtolower($string);
		//
		if ($this->input->post('submenu_id') == "") {
			$result = $this->m->get_submenu();
			$submenu = explode("/", $data['submenu_url']);
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			if ($result > 0) {
				$this->m->reorder();
			}

			$this->m->simpan($data);

			$this->create_controller($data, $submenu);
			$this->create_model($submenu);
			$this->create_view($submenu);
			$this->create_js($submenu);

			echo save_success();
		} else {
			$result = $this->m->get_data();
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');

			$this->m->edit($data);

			if ($result->submenu_urutan != $this->input->post('submenu_urutan')) {
				$this->m->reorder();
			}

			echo update_success();
		}
	}

	public function create_controller($data, $submenu)
	{
		copy(
			'./samples/controllers/samples.php',
			'./application/controllers/' . ucfirst($submenu[0]) . '/' . ucfirst($submenu[1]) . '.php'
		);

		$path_to_file = './application/controllers/' . ucfirst($submenu[0]) . '/' . ucfirst($submenu[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Model_folder/Samples_model", ucfirst($submenu[0]) . '/' . ucfirst($submenu[1] . '_model'), $file_contents);
		$file_contents = str_replace("Samples_controller", ucfirst($submenu[1]), $file_contents);
		$file_contents = str_replace("Samples Root", ucfirst($submenu[0]), $file_contents);
		$file_contents = str_replace("Samples Title", $data['submenu_root'], $file_contents);
		$file_contents = str_replace("samples_view/v_samples", strtolower($submenu[0]) . '/v_' . strtolower($submenu[1]), $file_contents);
		$file_contents = str_replace("samples/js/js_daftar_samples", strtolower($submenu[0] . '/js/js_' . $submenu[1]), $file_contents);
		$file_contents = str_replace("Samples", ucfirst($submenu[0]), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_model($submenu)
	{
		copy(
			'./samples/models/samples_model.php',
			'./application/models/' . ucfirst($submenu[0]) . '/' . ucfirst($submenu[1]) . '_model.php'
		);

		$path_to_file = './application/models/' . ucfirst($submenu[0]) . '/' . ucfirst($submenu[1]) . '_model.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Samples_model", ucfirst($submenu[1] . '_model'), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_view($submenu)
	{
		copy(
			'./samples/views/v_samples.php',
			'./application/views/' . strtolower($submenu[0]) . '/v_' . strtolower($submenu[1]) . '.php'
		);

		$path_to_file = './application/views/' . ucfirst($submenu[0]) . '/v_' . ucfirst($submenu[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_js($submenu)
	{
		copy(
			'./samples/views/js/js_samples.php',
			'./application/views/' . strtolower($submenu[0]) . '/js/js_' . strtolower($submenu[1]) . '.php'
		);

		$path_to_file = './application/views/' . strtolower($submenu[0]) . '/js/js_' . strtolower($submenu[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("samples/samples", strtolower($submenu[0] . '/' . $submenu[1]), $file_contents);
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
