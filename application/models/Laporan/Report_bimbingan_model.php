<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report_bimbingan_model extends CI_Model
{
	protected $pembimbing = "ak_data_master_pembimbing_sekolah";
	protected $biodata_prakerin = "ak_data_master_biodata_prakerin";
	protected $histori_bimbingan = "ak_data_histori_bimbingan_prakerin";

	public function get_list_data()
	{
		$this->datatables->select('bimbingan_prakerin_id, bimbingan_prakerin_tanggal, pembimbing_sekolah_nama, biodata_prakerin_nama, bimbingan_prakerin_keterangan, bimbingan_prakerin_validator');
		$this->datatables->from($this->histori_bimbingan);
		$this->datatables->join($this->pembimbing, $this->pembimbing . '.pembimbing_sekolah_id=' . $this->histori_bimbingan . '.pembimbing_sekolah_id');
		$this->datatables->join($this->biodata_prakerin, $this->biodata_prakerin . '.biodata_prakerin_id=' . $this->histori_bimbingan . '.biodata_prakerin_id');
		$this->datatables->where($this->histori_bimbingan . '.deleted', FALSE);
		return $this->datatables->generate();
	}
}
