<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses_modul_model extends CI_Model
{
	protected $level = "ak_data_system_level";
	protected $user = "ak_data_system_user";

	public function get_list_data()
	{
		$this->datatables->select('level_id, level_nama');
		$this->datatables->from($this->level);
		$this->datatables->where($this->level . '.deleted', FALSE);
		$this->datatables->where($this->level . '.level_id>', 1);
		$this->datatables->where($this->level . '.level_id<', 11);
		$this->datatables->add_column('view', "<button id='edit' class='btn btn-sm btn-info m-1' data='$1'><i class='fa fa-cog'></i></button>", "level_id");
		return $this->datatables->generate();
	}

	public function get_data()
	{
		$this->db->where($this->level . '.deleted', false);
		$this->db->where($this->level . '.level_id', $this->input->get('level_id'));
		return $this->db->get($this->level)->row();
	}

	public function get_users()
	{
		$this->db->where($this->user . '.deleted', false);
		$this->db->where($this->user . '.level_id', 2);
		return $this->db->get($this->user)->result();
	}

	public function edit($data)
	{
		$this->db->where($this->level . '.deleted', false);
		$this->db->where($this->level . '.level_id', $this->input->post('level_id'));
		return $this->db->update($this->level, $data);
	}
}
