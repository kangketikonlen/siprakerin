<?php defined('BASEPATH') or exit('No direct script access allowed');
class Portal_model extends CI_Model
{
	protected $info = "ak_data_system_info";
	protected $level = "ak_data_system_level";
	protected $user = "ak_data_system_user";
	protected $instansi = "ak_data_system_instansi";

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

	public function cek_validasi()
	{
		if ($this->cek_validasi_admin()) {
			return $this->cek_validasi_admin();
		} else {
			return FALSE;
		}
	}

	public function cek_validasi_admin()
	{
		$this->db->where($this->user . '.user_login', $this->input->post('user_login'));
		$this->db->order_by($this->user . '.user_id', 'desc');
		$password = $this->db->get($this->user)->row('user_pass');
		return password_verify($this->input->post('user_pass'), $password);
	}

	public function get_user($user_login)
	{
		if (!empty($this->get_user_admin($user_login))) {
			return $this->get_user_admin($user_login);
		} else {
			return NULL;
		}
	}

	public function get_user_admin($user_login)
	{
		$this->db->join($this->level, $this->level . '.level_id=' . $this->user . '.level_id');
		$this->db->where($this->user . '.user_login', $user_login);
		$this->db->order_by('user_id', 'desc');
		return $this->db->get($this->user)->row_array();
	}

	public function update_login($user_login)
	{
		return $this->db->where($this->user . '.user_login', $user_login)->update($this->user, array('user_last_login' => date('Y-m-d H:i:s')));
	}
}
