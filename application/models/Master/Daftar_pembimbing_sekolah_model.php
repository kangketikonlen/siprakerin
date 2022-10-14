<?php defined('BASEPATH') or exit('No direct script access allowed');
class Daftar_pembimbing_sekolah_model extends CI_Model
{
	protected $staff = "ak_data_master_staff";
	protected $pembimbing_sekolah = "ak_data_master_pembimbing_sekolah";

	public function get_list_data()
	{
		$this->datatables->select('pembimbing_sekolah_id, pembimbing_sekolah_user_login, pembimbing_sekolah_nama');
		$this->datatables->from($this->pembimbing_sekolah);
		$this->datatables->where($this->pembimbing_sekolah . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "pembimbing_sekolah_id");
		return $this->datatables->generate();
	}

	public function check_data()
	{
		$this->db->where($this->pembimbing_sekolah . '.pembimbing_sekolah_user_login', $this->input->post('pembimbing_sekolah_user_login'));
		return $this->db->get($this->pembimbing_sekolah)->row();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->pembimbing_sekolah, $data);
	}

	public function get_data_staff()
	{
		$sims = $this->load->database('sims', TRUE);
		$sims->where($this->staff . '.staff_login', $this->input->post('pembimbing_sekolah_user_login'));
		return $sims->get($this->staff)->row_array();
	}

	public function hapus()
	{
		$this->db->where($this->pembimbing_sekolah . '.pembimbing_sekolah_id', $this->input->get('pembimbing_sekolah_id'));
		return $this->db->delete($this->pembimbing_sekolah);
	}

	public function options()
	{
		$sims = $this->load->database('sims', TRUE);
		$sims->where($this->staff . '.deleted', FALSE);
		$opt = $sims->get($this->staff)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->staff_login, "text" => $opt->staff_nama);
		}

		return $data;
	}
}
