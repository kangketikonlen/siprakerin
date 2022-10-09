<?php defined('BASEPATH') or exit('No direct script access allowed');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;

class Kelola_kehadiran extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administrasi/Kelola_kehadiran_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Administrasi";
		$data['Title'] = "Kelola Kehadiran";
		$data['Breadcrumb'] = array('Administrasi');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "administrasi/v_kelola_kehadiran",
			'javascript' => 'administrasi/js/js_kelola_kehadiran'
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}

	public function simpan_kehadiran()
	{
		$data = $this->input->post();
		$is_exists = $this->m->check_data();
		if (empty($is_exists)) {
			$data['biodata_pendaftar_id'] = $this->session->userdata('id');
			$data['histori_kehadiran_tanggal'] = date("Y-m-d");
			$data['histori_kehadiran_jam_masuk'] = date("H:i:s");
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');
			$this->m->simpan($data);
			echo save_success();
		} else {
			echo custom_failed("Anda telah melakukan absen masuk sebelumnya!");
		}
	}

	public function update_kehadiran()
	{
		$data = $this->input->post();
		$is_exists = $this->m->check_data();
		if (!empty($is_exists)) {
			if (empty($is_exists->histori_kehadiran_jam_pulang)) {
				$data['histori_kehadiran_jam_pulang'] = date("H:i:s");
				$data['updated_by'] = $this->session->userdata('nama');
				$data['updated_date'] = date('Y-m-d H:i:s');
				$this->m->edit($data);
				echo update_success();
			} else {
				echo custom_failed("Anda telah mengisi absen pulang!");
			}
		} else {
			echo custom_failed("Anda belum melakukan absen masuk!");
		}
	}

	public function generate_qrcode()
	{
		$data['qrcode'] = $this->create_qrcode();
		echo json_encode($data);
	}

	public function create_qrcode()
	{
		$data_qrcode = base_url('digisign?type=kehadiran&id=' . $this->input->get('id'));
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
