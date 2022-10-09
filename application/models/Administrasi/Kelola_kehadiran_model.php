<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kelola_kehadiran_model extends CI_Model
{
	protected $histori_kehadiran = "ak_data_histori_kehadiran";

	public function get_list_data()
	{
		$this->datatables->select('histori_kehadiran_id, histori_kehadiran_tanggal, histori_kehadiran_jam_masuk, histori_kehadiran_jam_pulang, histori_kehadiran_validitor');
		$this->datatables->from($this->histori_kehadiran);
		$this->datatables->where($this->histori_kehadiran . '.biodata_pendaftar_id', $this->session->userdata('id'));
		$this->datatables->where($this->histori_kehadiran . '.deleted', FALSE);
		return $this->datatables->generate();
	}

	public function check_data()
	{
		$this->db->where($this->histori_kehadiran . '.biodata_pendaftar_id', $this->session->userdata('id'));
		$this->db->where($this->histori_kehadiran . '.histori_kehadiran_tanggal', date("Y-m-d"));
		return $this->db->get($this->histori_kehadiran)->row();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->histori_kehadiran, $data);
	}

	public function edit($data)
	{
		$this->db->where($this->histori_kehadiran . '.biodata_pendaftar_id', $this->session->userdata('id'));
		$this->db->where($this->histori_kehadiran . '.histori_kehadiran_tanggal', date("Y-m-d"));
		return $this->db->update($this->histori_kehadiran, $data);
	}
}
