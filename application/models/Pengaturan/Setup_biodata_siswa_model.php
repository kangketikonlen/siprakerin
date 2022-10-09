<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setup_biodata_siswa_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";

	public function simpan($data)
	{
		return $this->db->insert($this->biodata_prakerin, $data);
	}

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
}
