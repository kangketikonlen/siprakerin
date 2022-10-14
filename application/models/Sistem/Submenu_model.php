<?php defined('BASEPATH') or exit('No direct script access allowed');
class Submenu_model extends CI_Model
{
	protected $menu = "ak_data_system_menu";
	protected $submenu = "ak_data_system_menu_sub";

	public function get_list_data()
	{
		$this->datatables->select('submenu_id, submenu_urutan, menu_nama, submenu_root, submenu_nama, submenu_url');
		$this->datatables->join($this->menu, $this->menu . '.menu_id=' . $this->submenu . '.menu_id');
		$this->datatables->from($this->submenu);
		if ($this->input->get('menu_id') != "") {
			$this->datatables->where($this->submenu . '.menu_id', $this->input->get('menu_id'));
		}
		$this->datatables->where($this->submenu . '.menu_id>', 1);
		$this->datatables->where($this->submenu . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "submenu_id");
		return $this->datatables->generate();
	}

	public function search_menu($id)
	{
		$this->db->where($this->menu . '.menu_id', $id);
		return $this->db->get($this->menu)->row();
	}

	public function get_submenu()
	{
		return $this->db->where($this->submenu . '.deleted', false)->where($this->submenu . '.menu_id', $this->input->post('menu_id'))->where($this->submenu . '.submenu_urutan', $this->input->post('submenu_urutan'))->get($this->submenu)->num_rows();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->submenu, $data);
	}

	public function get_data()
	{
		return $this->db->where($this->submenu . '.deleted', false)->where($this->submenu . '.submenu_id', $this->input->post('submenu_id'))->get($this->submenu)->row();
	}

	public function edit($data)
	{
		return $this->db->where($this->submenu . '.deleted', false)->where($this->submenu . '.submenu_id', $this->input->post('submenu_id'))->update($this->submenu, $data);
	}

	public function reorder()
	{
		$this->db->where($this->submenu . '.menu_id', $this->input->post('menu_id'));
		$this->db->where($this->submenu . '.submenu_id!=', $this->input->post('submenu_id'));
		$this->db->where($this->submenu . '.submenu_urutan>=', $this->input->post('submenu_urutan'));
		$this->db->set($this->submenu . '.submenu_urutan', '`submenu_urutan`+ 1', FALSE);
		return $this->db->update($this->submenu);
	}

	public function hapus($data)
	{
		return $this->db->where($this->submenu . '.submenu_id', $this->input->post('submenu_id'))->update($this->submenu, $data);
	}

	public function options($src)
	{
		$opt = $this->db->like('submenu_nama', $src, 'both')->where('deleted', FALSE)->or_where('submenu_id', $src)->get($this->submenu)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->submenu_id, "text" => $opt->submenu_nama);
		}

		return $data;
	}
}
