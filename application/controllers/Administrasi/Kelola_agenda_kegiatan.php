<?php defined('BASEPATH') or exit('No direct script access allowed');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;

class Kelola_agenda_kegiatan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrasi/Kelola_agenda_kegiatan_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Administrasi";
		$data['Title'] = "Kelola Agenda Kegiatan";
		$data['Breadcrumb'] = array('Administrasi');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar_topbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "administrasi/v_kelola_agenda_kegiatan",
			'javascript' => 'administrasi/js/js_kelola_agenda_kegiatan'
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
		if (empty($data['histori_agenda_kegiatan_id'])) {
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

	public function hapus()
	{
		$this->m->hapus();
		echo delete_success();
	}

	public function generate_qrcode()
	{
		$data['qrcode'] = $this->create_qrcode();
		echo json_encode($data);
	}

	public function create_qrcode()
	{
		$data_qrcode = base_url('digisign?type=agenda&id=' . $this->input->get('id'));
		$result = Builder::create()
			->writer(new PngWriter())
			->writerOptions([])
			->data($data_qrcode)
			->encoding(new Encoding('UTF-8'))
			->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
			->size(500)
			->margin(0)
			->roundBlockSizeMode(new RoundBlockSizeModeMargin())
			->logoPath('.' . $this->session->userdata('AppLogo'))
			->logoResizeToWidth(250)
			->build();
		return $result->getDataUri();
	}
}
