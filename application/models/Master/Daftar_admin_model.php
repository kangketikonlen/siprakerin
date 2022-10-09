<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_admin_model extends CI_Model
{
	protected $user = "ak_data_system_user";

	public function get_list_data()
	{
		$btn_edit = "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button>";
		$btn_delete = "<button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>";

		$this->datatables->select('user_id, user_nama, user_login, user_email');
		$this->datatables->from($this->user);
		$this->datatables->where($this->user . '.deleted', FALSE);
		$this->datatables->add_column('view', $btn_edit . " " . $btn_delete, "user_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->user, $data);
	}

	public function get_data()
	{
		$this->db->where($this->user . '.user_id', $this->input->get('user_id'));
		return $this->db->get($this->user)->row();
	}

	public function update($data)
	{
		$this->db->where($this->user . '.user_id', $this->input->post('user_id'));
		return $this->db->update($this->user, $data);
	}

	public function delete()
	{
		$this->db->where($this->user . '.user_id', $this->input->get('user_id'));
		return $this->db->update($this->user);
	}
}
