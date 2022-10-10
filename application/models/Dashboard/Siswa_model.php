<?php defined('BASEPATH') or exit('No direct script access allowed');
class Siswa_model extends CI_Model
{
	protected $agenda = "ak_data_histori_agenda_kegiatan";
	protected $kehadiran = "ak_data_histori_kehadiran";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $biodata_industri = "ak_data_master_biodata_industri";

	public function get_peserta()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}

	public function get_industri()
	{
		$this->db->where($this->biodata_industri . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_industri)->row();
	}

	public function get_kehadiran_today()
	{
		$this->db->where($this->kehadiran . '.biodata_prakerin_id', $this->session->userdata('id'));
		$this->db->where($this->kehadiran . '.histori_kehadiran_tanggal', date("Y-m-d"));
		return $this->db->get($this->kehadiran)->row();
	}

	public function get_agenda_today()
	{
		$this->db->where($this->agenda . '.biodata_prakerin_id', $this->session->userdata('id'));
		$this->db->where($this->agenda . '.histori_agenda_kegiatan_tanggal', date("Y-m-d"));
		return $this->db->get($this->agenda)->row();
	}
}
