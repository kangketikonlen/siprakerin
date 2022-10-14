<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses_menu_model extends CI_Model
{
	protected $level = "ak_data_system_level";
	protected $menu = "ak_data_system_menu";
	protected $submenu = "ak_data_system_menu_sub";

	public function get_list_data()
	{
		$this->datatables->select('submenu_id, menu_nama, submenu_root, submenu_nama, submenu_roles');
		$this->datatables->join($this->menu, $this->menu . '.menu_id=' . $this->submenu . '.menu_id');
		$this->datatables->from($this->submenu);
		if ($this->input->get('menu_id') != "") {
			$this->datatables->where($this->submenu . '.menu_id', $this->input->get('menu_id'));
		}
		$this->datatables->where($this->submenu . '.menu_id>', 1);
		$this->datatables->where($this->submenu . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button>", "submenu_id");
		return $this->datatables->generate();
	}

	public function get_level()
	{
		$this->db->where($this->level . '.deleted', FALSE);
		$this->db->where($this->level . '.level_id>', 1);
		return $this->db->get($this->level)->result();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->submenu, $data);
	}

	public function simpan_menu($data)
	{
		return $this->db->insert($this->menu, $data);
	}

	public function get_data()
	{
		$this->db->where($this->submenu . '.deleted', false);
		$this->db->where($this->submenu . '.submenu_id', $this->input->get('submenu_id'));
		return $this->db->get($this->submenu)->row();
	}

	public function get_data_menu()
	{
		$this->db->where($this->menu . '.deleted', false);
		$this->db->where($this->menu . '.menu_id', $this->input->get('menu_id'));
		return $this->db->get($this->menu)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->submenu . '.deleted', false);
		$this->db->where($this->submenu . '.submenu_id', $this->input->post('submenu_id'));
		return $this->db->update($this->submenu, $data);
	}

	public function edit_menu($data)
	{
		$this->db->where($this->menu . '.deleted', false);
		$this->db->where($this->menu . '.menu_id', $this->input->post('menu_id'));
		return $this->db->update($this->menu, $data);
	}

	public function hapus($data)
	{
		$this->db->where($this->submenu . '.submenu_id', $this->input->post('submenu_id'));
		return $this->db->update($this->submenu, $data);
	}

	public function options($src)
	{
		$this->db->like('submenu_nama', $src, 'both');
		$this->db->where('deleted', FALSE);
		$this->db->or_where('submenu_id', $src);
		$opt = $this->db->get($this->submenu)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->submenu_id, "text" => $opt->submenu_nama);
		}

		return $data;
	}
}
