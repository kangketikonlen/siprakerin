<?php defined('BASEPATH') or exit('No direct script access allowed');
class Menu_utama extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sistem/Menu_utama_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Menu Utama";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_menu_utama",
			'javascript' => 'sistem/js/js_menu_utama'
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

		$data['menu_cpath'] = './application/controllers/' . ucfirst($data['menu_nama']);
		$data['menu_mpath'] = './application/models/' . ucfirst($data['menu_nama']);
		$data['menu_vpath'] = './application/views/' . strtolower($data['menu_nama']);
		$data['menu_jpath'] = './application/views/' . strtolower($data['menu_nama'] . '/js/');

		if ($this->input->post('menu_id') == "") {
			$result = $this->m->get_menu();
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			if ($result > 0) {
				$this->m->reorder();
			}

			$this->create_files($data['menu_nama']);

			$this->m->simpan($data);

			echo save_success();
		} else {
			$result = $this->m->get_data();
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');

			if ($result->menu_urutan != $this->input->post('menu_urutan')) {
				$this->m->reorder();
			}

			if ($data['menu_nama'] != $result->menu_nama) {
				$this->rename_files($data['menu_nama'], $result->menu_nama);
			}

			$this->m->edit($data);

			echo update_success();
		}
	}

	public function create_files($menu)
	{
		if (!file_exists('./application/controllers/' . ucfirst($menu))) {
			mkdir('./application/controllers/' . ucfirst($menu), 0777, true);
		}

		if (!file_exists('./application/models/' . ucfirst($menu))) {
			mkdir('./application/models/' . ucfirst($menu), 0777, true);
		}

		if (!file_exists('./application/views/' . strtolower($menu))) {
			mkdir('./application/views/' . strtolower($menu), 0777, true);
		}

		if (!file_exists('./application/views/' . strtolower($menu . '/js/'))) {
			mkdir('./application/views/' . strtolower($menu . '/js/'), 0777, true);
		}
	}

	public function rename_files($menu_new, $menu_old)
	{
		rename('./application/controllers/' . ucfirst($menu_old), './application/controllers/' . ucfirst($menu_new));

		rename('./application/models/' . ucfirst($menu_old), './application/models/' . ucfirst($menu_new));

		rename('./application/views/' . strtolower($menu_old), './application/views/' . strtolower($menu_new));
	}

	public function remove_files($menu)
	{
		$this->removeDir('./application/controllers/' . ucfirst($menu));

		$this->removeDir('./application/models/' . ucfirst($menu));

		$this->removeDir('./application/views/' . strtolower($menu));
	}

	function removeDir($dirname)
	{
		if (is_dir($dirname)) {
			$dir = new RecursiveDirectoryIterator($dirname, RecursiveDirectoryIterator::SKIP_DOTS);
			foreach (new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST) as $object) {
				if ($object->isFile()) {
					unlink($object);
				} elseif ($object->isDir()) {
					rmdir($object);
				} else {
					throw new Exception('Unknown object type: ' . $object->getFileName());
				}
			}
			rmdir($dirname);
		} else {
			throw new Exception('This is not a directory');
		}
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function hapus()
	{
		$result = $this->m->get_data();

		$this->remove_files($result->menu_nama);

		$this->m->hapus();

		echo delete_success();
	}

	public function options()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->m->options($searchTerm);
		echo json_encode($response);
	}
}
