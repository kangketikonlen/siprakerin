<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_biodata_siswa_model extends CI_Model
{
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";

	public function get_list_data()
	{
		$this->datatables->select('biodata_prakerin_id, biodata_prakerin_user_login, biodata_prakerin_nama');
		$this->datatables->from($this->biodata_prakerin);
		$this->datatables->where($this->biodata_prakerin . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='btn-detail' class='m-1 btn btn-block btn-info' data='$1'><i class='fa fa-clipboard'></i> Detail</button>", "biodata_prakerin_id");
		return $this->datatables->generate();
	}

	public function get_data()
	{
		$this->db->where($this->biodata_prakerin . '.biodata_prakerin_id', $this->input->get('biodata_prakerin_id'));
		return $this->db->get($this->biodata_prakerin)->row();
	}
}
