<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_user_model extends CI_Model
{
	protected $user = "ak_data_system_user";
	protected $level = "ak_data_system_level";

	public function get_list_data()
	{
		$this->datatables->select('user_id, level_nama, user_nama, user_login, user_last_login');
		$this->datatables->from($this->user);
		$this->datatables->where($this->user . '.deleted', FALSE);
		$this->datatables->where($this->user . '.user_id!=', 1);
		$this->datatables->join($this->level, $this->level . '.level_id=' . $this->user . '.level_id');
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "user_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->user, $data);
	}

	public function get_data()
	{
		$this->db->where($this->user . '.deleted', false);
		$this->db->where($this->user . '.user_id', $this->input->get('user_id'));
		return $this->db->get($this->user)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->user . '.deleted', false);
		$this->db->where($this->user . '.user_id', $this->input->post('user_id'));
		return $this->db->update($this->user, $data);
	}

	public function hapus($data)
	{
		$this->db->where($this->user . '.user_id', $this->input->get('user_id'));
		return $this->db->update($this->user, $data);
	}

	public function options($src)
	{
		$this->db->like('user_nama', $src, 'both');
		$this->db->where('deleted', FALSE);
		$this->db->or_where('user_id', $src);
		$opt = $this->db->get($this->user)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->user_id, "text" => $opt->user_nama);
		}

		return $data;
	}
}
