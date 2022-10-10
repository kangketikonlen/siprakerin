<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setup_biodata_siswa_model extends CI_Model
{
	protected $kelas = "ak_data_master_kelas";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";

	public function get_data()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->update($this->biodata_prakerin, $data);
	}

	public function option_kelas()
	{
		$sims = $this->load->database('sims', TRUE);
		$sims->where($this->kelas . '.deleted', FALSE);
		$opt = $sims->get($this->kelas)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->kelas_deskripsi, "text" => $opt->kelas_deskripsi);
		}

		return $data;
	}
}
