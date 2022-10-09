<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_biodata_industri extends CI_Migration
{
	protected $table_name = "ak_data_master_biodata_industri";
	protected $prefix = "biodata_industri_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'biodata_pendaftar_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'telepon' => array(
				'type' => 'CHAR',
				'constraint' => 18,
			),
			$this->prefix . 'bidang_usaha' => array(
				'type' => 'VARCHAR',
				'constraint' => 128
			),
			$this->prefix . 'nama_direktur' => array(
				'type' => 'VARCHAR',
				'constraint' => 128
			),
			$this->prefix . 'nama_pembimbing_1' => array(
				'type' => 'VARCHAR',
				'constraint' => 128
			),
			$this->prefix . 'nama_pembimbing_2' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tanggal_mulai' => array(
				'type' => 'DATE'
			),
			$this->prefix . 'tanggal_selesai' => array(
				'type' => 'DATE'
			),
			'created_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => 'System'
			),
			'created_date datetime default current_timestamp',
			'updated_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => NULL,
				'null' => TRUE
			),
			'updated_date datetime on update current_timestamp',
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0
			),
		);

		return $fields;
	}

	public function up()
	{
		// Generate fields
		$fields = $this->generate_fields();
		// Add field from above variables
		$this->dbforge->add_field($fields);
		// Assign key
		$this->dbforge->add_key($this->prefix . 'id', TRUE);
		// Create table
		$this->dbforge->create_table($this->table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->table_name, TRUE);
	}
}
