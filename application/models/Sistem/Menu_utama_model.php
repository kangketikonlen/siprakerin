<?php defined('BASEPATH') or exit('No direct script access allowed');
class Menu_utama_model extends CI_Model
{
	protected $menu = "ak_data_system_menu";

	public function get_list_data()
	{
		$this->datatables->select('menu_id, menu_urutan, menu_icon, menu_nama');
		$this->datatables->from($this->menu);
		$this->datatables->where($this->menu . '.menu_id>', 1);
		$this->datatables->where($this->menu . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "menu_id");
		return $this->datatables->generate();
	}

	public function get_menu()
	{
		return $this->db->where($this->menu . '.deleted', false)->where($this->menu . '.menu_id', $this->input->post('menu_id'))->or_where($this->menu . '.menu_urutan', $this->input->post('menu_urutan'))->get($this->menu)->num_rows();
	}

	public function reorder()
	{
		$this->db->where($this->menu . '.menu_id!=', $this->input->post('menu_id'));
		$this->db->where($this->menu . '.menu_urutan>=', $this->input->post('menu_urutan'));
		$this->db->set($this->menu . '.menu_urutan', '`menu_urutan`+ 1', FALSE);
		return $this->db->update($this->menu);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->menu, $data);
	}

	public function get_data()
	{
		return $this->db->where($this->menu . '.deleted', false)->where($this->menu . '.menu_id', $this->input->post('menu_id'))->get($this->menu)->row();
	}

	public function edit($data)
	{
		return $this->db->where($this->menu . '.deleted', false)->where($this->menu . '.menu_id', $this->input->post('menu_id'))->update($this->menu, $data);
	}

	public function hapus()
	{
		return $this->db->where($this->menu . '.menu_id', $this->input->post('menu_id'))->delete($this->menu);
	}

	public function options()
	{
		$this->db->where($this->menu . '.deleted', FALSE);
		$this->db->where($this->menu . '.menu_id>', 1);
		$opt = $this->db->get($this->menu)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->menu_id, "text" => $opt->menu_nama);
		}

		return $data;
	}
}
