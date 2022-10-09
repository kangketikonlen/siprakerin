<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_periode_model extends CI_Model
{
	protected $periode = "ak_dara_master_periode";

	public function get_list_data()
	{
		$btn_edit = "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button>";
		$btn_delete = "<button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>";

		$this->datatables->select('periode_id, periode_deskripsi, periode_status');
		$this->datatables->from($this->periode);
		$this->datatables->where($this->periode . '.deleted', FALSE);
		$this->datatables->add_column('view', $btn_edit . " " . $btn_delete, "periode_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->periode, $data);
	}

	public function get_data()
	{
		$this->db->where($this->periode . '.periode_id', $this->input->get('periode_id'));
		return $this->db->get($this->periode)->row();
	}

	public function update($data)
	{
		$this->db->where($this->periode . '.periode_id', $this->input->post('periode_id'));
		return $this->db->update($this->periode, $data);
	}

	public function change_status($data)
	{
		$this->db->where($this->periode . '.periode_id', $this->input->get('periode_id'));
		return $this->db->update($this->periode, $data);
	}

	public function delete()
	{
		$this->db->where($this->periode . '.periode_id', $this->input->get('periode_id'));
		return $this->db->delete($this->periode);
	}

	public function options()
	{
		$this->db->where($this->periode . '.deleted', FALSE);
		$opt = $this->db->get($this->periode)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->periode_id, "text" => $opt->periode_deskripsi);
		}

		return $data;
	}
}
