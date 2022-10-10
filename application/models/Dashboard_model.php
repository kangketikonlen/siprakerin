<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
	protected $menu = "ak_data_system_menu";
	protected $submenu = "ak_data_system_menu_sub";
	protected $hak_akses = "ak_data_system_hak_akses";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";

	public function get_menu()
	{
		$this->db->where($this->menu . '.deleted', FALSE);
		$this->db->order_by($this->menu . '.menu_urutan', 'asc');
		return $this->db->get($this->menu)->result();
	}

	public function get_submenu($menu)
	{
		$this->db->where($this->submenu . '.deleted', FALSE);
		$this->db->order_by($this->submenu . '.submenu_urutan', 'asc');
		$this->db->where($this->submenu . '.menu_id', $menu);
		return $this->db->get($this->submenu)->result();
	}

	public function get_single_submenu($slug)
	{
		$this->db->where($this->submenu . '.submenu_url', $slug);
		return $this->db->get($this->submenu)->row();
	}

	public function get_hak_akses($sub)
	{
		$this->db->where($this->hak_akses . '.submenu_id', $sub);
		$this->db->where($this->hak_akses . '.level_id', $this->session->userdata('level_id'));
		$this->db->join($this->submenu, $this->submenu . '.submenu_id=' . $this->hak_akses . '.submenu_id');
		return $this->db->get($this->hak_akses)->row();
	}

	public function get_status()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->session->userdata('id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}
}
