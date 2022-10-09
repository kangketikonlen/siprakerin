<?php defined('BASEPATH') or exit('No direct script access allowed');
class Siswa_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";

	public function get_peserta()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}
}
