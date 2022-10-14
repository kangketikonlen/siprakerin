<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kelola_bimbingan_prakerin_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $bimbingan_prakerin = "ak_data_histori_bimbingan_prakerin";

	public function get_list_data()
	{
		$this->datatables->select('bimbingan_prakerin_id, bimbingan_prakerin_tanggal, biodata_prakerin_nama, bimbingan_prakerin_keterangan, bimbingan_prakerin_validator');
		$this->datatables->from($this->bimbingan_prakerin);
		$this->datatables->join($this->biodata_prakerin, $this->bimbingan_prakerin . '.biodata_prakerin_id=' . $this->bimbingan_prakerin . '.biodata_prakerin_id');
		$this->datatables->where($this->bimbingan_prakerin . '.pembimbing_sekolah_id', $this->session->userdata('id'));
		$this->datatables->where($this->bimbingan_prakerin . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "bimbingan_prakerin_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->bimbingan_prakerin, $data);
	}

	public function get_data()
	{
		$this->db->where($this->bimbingan_prakerin . '.bimbingan_prakerin_id', $this->input->get('bimbingan_prakerin_id'));
		return $this->db->get($this->bimbingan_prakerin)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->bimbingan_prakerin . '.bimbingan_prakerin_id', $this->input->post('bimbingan_prakerin_id'));
		return $this->db->update($this->bimbingan_prakerin, $data);
	}

	public function hapus()
	{
		$this->db->where($this->bimbingan_prakerin . '.bimbingan_prakerin_id', $this->input->get('bimbingan_prakerin_id'));
		return $this->db->delete($this->bimbingan_prakerin);
	}
}
