<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kelola_aproval_prakerin_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $biodata_industri = "ak_data_master_biodata_industri";

	public function get_list_data()
	{
		$this->datatables->select('biodata_industri_id, biodata_prakerin_id, biodata_prakerin_nama, biodata_industri_nama, biodata_industri_tanggal_mulai, biodata_industri_tanggal_selesai, biodata_prakerin_status');
		$this->datatables->from($this->biodata_industri);
		$this->datatables->join($this->biodata_prakerin, $this->biodata_prakerin . '.biodata_prakerin_id=' . $this->biodata_industri . '.biodata_pendaftar_id');
		$this->datatables->where($this->biodata_industri . '.deleted', FALSE);
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->biodata_industri, $data);
	}

	public function get_data()
	{
		$this->db->where($this->biodata_industri . '.biodata_industri_id', $this->input->get('biodata_industri_id'));
		return $this->db->get($this->biodata_industri)->row();
	}

	public function get_data_prakerin()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->input->get('biodata_pendaftar_id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}

	public function edit_prakerin($data)
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->input->post('biodata_pendaftar_id'));
		return $this->db->update($this->biodata_prakerin, $data);
	}

	public function edit($data)
	{
		$this->db->where($this->biodata_industri . '.biodata_industri_id', $this->input->post('biodata_industri_id'));
		return $this->db->update($this->biodata_industri, $data);
	}

	public function hapus($data)
	{
		$this->db->where($this->biodata_industri . '.biodata_industri_id', $this->input->get('biodata_industri_id'));
		return $this->db->update($this->biodata_industri, $data);
	}

	public function options()
	{
		$this->db->where($this->biodata_industri . '.deleted', FALSE);
		$opt = $this->db->get($this->biodata_industri)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->biodata_industri_id, "text" => $opt->biodata_industri_nama);
		}

		return $data;
	}
}
