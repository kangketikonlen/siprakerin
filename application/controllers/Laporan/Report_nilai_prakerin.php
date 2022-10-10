<?php defined('BASEPATH') or exit('No direct script access allowed');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;

class Report_nilai_prakerin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan/Report_nilai_prakerin_model', 'm');
	}

	public function index()
	{
		$data['Root'] = "Laporan";
		$data['Title'] = "Report Nilai Prakerin";
		$data['Breadcrumb'] = array('Laporan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private_topbar",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "laporan/v_report_nilai_prakerin",
			'javascript' => 'laporan/js/js_report_nilai_prakerin'
		);
		$data['aspek'] = $this->aspek_nilai();
		$data['nilai'] = $this->angka_nilai();
		$data['jumlah_nilai'] = 0;
		$data['jumlah_aspek'] = count($this->aspek_nilai());
		$data['qrcode'] = $this->create_qrcode();
		$this->load->view('v_main', $data);
	}

	private function aspek_nilai()
	{
		return array('Pengetahuan Kerja', 'Kemampuan Kerja', 'Kualitas Kerja', 'Sikap', 'Kerja Sama', 'Disiplin', 'Tanggung Jawab', 'Kerajinan', 'Inisiatif', 'Laporan Hasil Kerja Praktik');
	}

	private function angka_nilai()
	{
		$data = $this->m->get_data();
		if (!empty($data)) {
			return array($data['nilai_prakerin_1'], $data['nilai_prakerin_2'], $data['nilai_prakerin_3'], $data['nilai_prakerin_4'], $data['nilai_prakerin_5'], $data['nilai_prakerin_6'], $data['nilai_prakerin_7'], $data['nilai_prakerin_8'], $data['nilai_prakerin_9'], $data['nilai_prakerin_10']);
		} else {
			return array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0,);
		}
	}

	public function create_qrcode()
	{
		$data_qrcode = base_url('penilaian?id=' . $this->input->get('id'));
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
