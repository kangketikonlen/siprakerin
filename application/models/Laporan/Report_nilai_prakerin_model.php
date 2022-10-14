<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report_nilai_prakerin_model extends CI_Model
{
	protected $nilai_prakerin = "ak_data_histori_nilai_prakerin";
	protected $biodata_industri = "ak_data_master_biodata_industri";

	public function get_data()
	{
		$this->db->where($this->nilai_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->nilai_prakerin)->row_array();
	}

	public function get_data_prakerin()
	{
		$this->db->where($this->biodata_industri . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_industri)->row_array();
	}
}
