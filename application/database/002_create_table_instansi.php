<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_instansi extends CI_Migration
{
	protected $table_name = "ak_data_system_instansi";
	protected $prefix = "instansi_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			$this->prefix . 'logo' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => '/assets/images/logo/default.png'
			),
			$this->prefix . 'background' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => '/assets/images/background/background.jpg'
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'alamat_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'website' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'url_sistem' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'kontak' => array(
				'type' => 'CHAR',
				'constraint' => 25,
			),
			$this->prefix . 'user' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'pass' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
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

	private function seed_sample()
	{
		$data = array(
			'instansi_logo' => '/assets/images/logo/default.png',
			'instansi_background' => '/assets/images/background/background.jpg',
			'instansi_nama' => 'KANGKETIK',
			'instansi_alamat' => 'Jl. Raya Banjaran No. 112 D RT 03 RW.03',
			'instansi_alamat_email' => 'developer@kangketik.web.id',
			'instansi_website' => 'https://kangketik.web.id/',
			'instansi_url_sistem' => 'http://localhost/siskamlingci/',
			'instansi_kontak' => '085155034228',
		);
		$this->db->insert($this->table_name, $data);
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
		// Seed database
		$this->seed_sample();
	}

	public function down()
	{
		$this->dbforge->drop_table($this->table_name, TRUE);
	}
}
