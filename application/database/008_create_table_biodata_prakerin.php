<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_biodata_prakerin extends CI_Migration
{
	protected $table_name = "ak_data_master_biodata_prakerin";
	protected $prefix = "biodata_prakerin_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			$this->prefix . 'user_login' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'kelas' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'prodi' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'tempat_lahir' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tanggal_lahir' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			$this->prefix . 'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'telepon' => array(
				'type' => 'CHAR',
				'constraint' => 18,
				'null' => TRUE
			),
			$this->prefix . 'nama_ayah' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tempat_lahir_ayah' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tanggal_lahir_ayah' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			$this->prefix . 'pekerjaan_ayah' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'pendidikan_ayah' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'nama_ibu' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tempat_lahir_ibu' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'tanggal_lahir_ibu' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			$this->prefix . 'pekerjaan_ibu' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'pendidikan_ibu' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'status' => array(
				'type' => 'ENUM("Proses", "Disetujui", "Tidak Disetujui")',
				'default' => "Proses",
				'null' => FALSE
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
