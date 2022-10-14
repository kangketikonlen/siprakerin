<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pembimbing_industri_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $histori_nilai_prakerin = "ak_data_histori_nilai_prakerin";

	public function get_peserta()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}

	public function get_data()
	{
		$this->db->where($this->histori_nilai_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->histori_nilai_prakerin)->row();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->histori_nilai_prakerin, $data);
	}

	public function edit($data)
	{
		$this->db->where($this->histori_nilai_prakerin . '.nilai_prakerin_id', $this->input->post('nilai_prakerin_id'));
		return $this->db->update($this->histori_nilai_prakerin, $data);
	}
}
