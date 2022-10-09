<?php defined('BASEPATH') or exit('No direct script access allowed');
class Informasi_sistem_model extends CI_Model
{
	protected $info = "ak_data_system_info";

	public function get_data()
	{
		$this->db->where($this->info . '.deleted', false);
		$this->db->where($this->info . '.info_id', 1);
		return $this->db->get($this->info)->row();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->info, $data);
	}

	public function edit($data)
	{
		$this->db->where($this->info . '.deleted', false);
		$this->db->where($this->info . '.info_id', $this->input->post('info_id'));
		return $this->db->update($this->info, $data);
	}
}
