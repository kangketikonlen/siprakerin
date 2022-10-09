<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kelola_agenda_kegiatan_model extends CI_Model
{
	protected $histori_agenda_kegiatan = "ak_data_histori_agenda_kegiatan";

	public function get_list_data()
	{
		$this->datatables->select('histori_agenda_kegiatan_id, histori_agenda_kegiatan_tanggal, histori_agenda_kegiatan_pekerjaan, histori_agenda_kegiatan_validitor');
		$this->datatables->from($this->histori_agenda_kegiatan);
		$this->datatables->where($this->histori_agenda_kegiatan . '.deleted', FALSE);
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "histori_agenda_kegiatan_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->histori_agenda_kegiatan, $data);
	}

	public function get_data()
	{
		$this->db->where($this->histori_agenda_kegiatan . '.histori_agenda_kegiatan_id', $this->input->get('histori_agenda_kegiatan_id'));
		return $this->db->get($this->histori_agenda_kegiatan)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->histori_agenda_kegiatan . '.histori_agenda_kegiatan_id', $this->input->post('histori_agenda_kegiatan_id'));
		return $this->db->update($this->histori_agenda_kegiatan, $data);
	}

	public function hapus()
	{
		$this->db->where($this->histori_agenda_kegiatan . '.histori_agenda_kegiatan_id', $this->input->get('histori_agenda_kegiatan_id'));
		return $this->db->delete($this->histori_agenda_kegiatan);
	}
}
