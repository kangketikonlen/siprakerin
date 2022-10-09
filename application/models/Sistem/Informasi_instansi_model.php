<?php defined('BASEPATH') or exit('No direct script access allowed');
class Informasi_instansi_model extends CI_Model
{
	protected $instansi = "ak_data_system_instansi";
	protected $user = "ak_data_system_user";

	public function get_list_data()
	{
		$this->datatables->select('instansi_id, instansi_nama, instansi_user, instansi_pass, instansi_url_sistem');
		$this->datatables->from($this->instansi);
		$this->datatables->where($this->instansi . '.instansi_id>', 1);
		$this->datatables->where($this->instansi . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='btn btn-sm btn-info m-1' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='btn btn-sm btn-danger m-1' data='$1'><i class='fa fa-trash'></i></button>", "instansi_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		$this->db->insert($this->instansi, $data);
		return $this->db->insert_id();
	}

	public function simpan_user($data)
	{
		$this->db->insert($this->user, $data);
		return $this->db->insert_id();
	}

	public function get_data()
	{
		$this->db->where($this->instansi . '.deleted', false);
		$this->db->where($this->instansi . '.instansi_id', $this->input->get('instansi_id'));
		return $this->db->get($this->instansi)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->instansi . '.deleted', false);
		$this->db->where($this->instansi . '.instansi_id', $this->input->post('instansi_id'));
		return $this->db->update($this->instansi, $data);
	}

	public function hapus($data)
	{
		$this->db->where($this->instansi . '.instansi_id', $this->input->get('instansi_id'));
		return $this->db->update($this->instansi, $data);
	}

	public function options($src)
	{
		$this->db->like($this->instansi . '.instansi_nama', $src, 'both');
		$this->db->where($this->instansi . '.deleted', FALSE);
		$opt = $this->db->get($this->instansi)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->instansi_id, "text" => $opt->instansi_nama);
		}

		return $data;
	}
}
