<?php defined('BASEPATH') or exit('No direct script access allowed');
class Landing_model extends CI_Model
{
	protected $modul = "ak_data_system_modul";
	protected $submodul = "ak_data_system_modul_sub";
	protected $hak_akses = "ak_data_system_hak_akses";
	protected $level = "ak_data_system_level";

	public function get_level()
	{
		return $this->db->where($this->level . '.deleted', FALSE)->get($this->level)->result();
	}

	public function get_modul()
	{
		return $this->db->where($this->modul . '.deleted', FALSE)->order_by($this->modul . '.modul_urutan', 'asc')->get($this->modul)->result();
	}

	public function get_submodul($modul)
	{
		return $this->db->where($this->submodul . '.deleted', FALSE)->order_by($this->submodul . '.submodul_urutan', 'asc')->where($this->submodul . '.modul_id', $modul)->get($this->submodul)->result();
	}

	public function get_hak_akses($sub)
	{
		return $this->db->where($this->hak_akses . '.submodul_id', $sub)->where($this->hak_akses . '.level_id', $this->session->userdata('level_id'))->join($this->submodul, $this->submodul . '.submodul_id=' . $this->hak_akses . '.submodul_id')->get($this->hak_akses)->row();
	}
}
