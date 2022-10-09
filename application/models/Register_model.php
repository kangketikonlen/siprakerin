<?php defined('BASEPATH') or exit('No direct script access allowed');
class Register_model extends CI_Model
{
	protected $info = "ak_data_system_info";
	protected $instansi = "ak_data_system_instansi";
	protected $siswa = "ak_data_master_siswa";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $pembimbing_sekolah = "ak_data_master_pembimbing_sekolah";

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
		$sims = $this->load->database('sims', TRUE);
		$sims->where($this->siswa . '.siswa_login', $this->input->get('username'));
		return $sims->get($this->siswa)->row_array();
	}

	public function check_data()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_user_login', $this->input->get('username'));
		return $this->db->get($this->biodata_prakerin)->row_array();
	}

	public function check_data_pembimbing()
	{
		$this->db->where($this->pembimbing_sekolah . '.pembimbing_sekolah_user_login', $this->input->get('username'));
		return $this->db->get($this->pembimbing_sekolah)->row_array();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->biodata_prakerin, $data);
	}
}
