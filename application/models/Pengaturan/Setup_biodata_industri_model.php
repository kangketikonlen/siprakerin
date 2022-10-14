<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setup_biodata_industri_model extends CI_Model
{
	protected $biodata_industri = "ak_data_master_biodata_industri";

	public function simpan($data)
	{
		return $this->db->insert($this->biodata_industri, $data);
	}

	public function get_data()
	{
		$this->db->where($this->biodata_industri . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_industri)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->biodata_industri . '.biodata_industri_id', $this->input->post('biodata_industri_id'));
		return $this->db->update($this->biodata_industri, $data);
	}
}
