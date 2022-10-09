<?php defined('BASEPATH') or exit('No direct script access allowed');
class Digisign_model extends CI_Model
{
	protected $info = "ak_data_system_info";
	protected $instansi = "ak_data_system_instansi";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $histori_kehadiran = "ak_data_histori_kehadiran";
	protected $histori_agenda_kegiatan = "ak_data_histori_agenda_kegiatan";

	public function get_sysinfo()
	{
		return $this->db->get($this->info)->row();
	}

	public function get_instansi()
	{
		$this->db->where($this->instansi . '.instansi_url_sistem', base_url());
		$data = $this->db->get($this->instansi)->row();

		if (!empty($data)) {
			return $data;
		} else {
			$this->db->where($this->instansi . '.instansi_id', 1);
			return $this->db->get($this->instansi)->row();
		}
	}

	public function get_data()
	{
		$this->db->join($this->biodata_prakerin, $this->biodata_prakerin . '.biodata_prakerin_id=' . $this->histori_kehadiran . '.biodata_pendaftar_id');
		$this->db->where($this->histori_kehadiran . '.histori_kehadiran_id', $this->input->get('id'));
		return $this->db->get($this->histori_kehadiran)->row_array();
	}

	public function get_data_agenda()
	{
		$this->db->join($this->biodata_prakerin, $this->biodata_prakerin . '.biodata_prakerin_id=' . $this->histori_agenda_kegiatan . '.biodata_pendaftar_id');
		$this->db->where($this->histori_agenda_kegiatan . '.histori_agenda_kegiatan_id', $this->input->get('id'));
		return $this->db->get($this->histori_agenda_kegiatan)->row_array();
	}

	public function simpan($data)
	{
		$this->db->where($this->histori_kehadiran . '.histori_kehadiran_id', $this->input->post('histori_kehadiran_id'));
		return $this->db->update($this->histori_kehadiran, $data);
	}

	public function simpan_agenda($data)
	{
		$this->db->where($this->histori_agenda_kegiatan . '.histori_agenda_kegiatan_id', $this->input->post('histori_agenda_kegiatan_id'));
		return $this->db->update($this->histori_agenda_kegiatan, $data);
	}
}
