<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_level extends CI_Migration
{
	protected $table_name = "ak_data_system_level";
	protected $prefix = "level_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'icon' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'background' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'type' => array(
				'type' => 'ENUM("Landing","Dashboard")',
				'default' => "Landing",
				'null' => FALSE
			),
			$this->prefix . 'show_landing' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "0,1"
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
			array(
				'level_nama' => 'Master',
				'level_url' => 'dashboard/landing',
				'level_icon' => 'fa-database',
				'level_background' => '#778beb',
				'level_type' => 'Landing',
				'level_show_landing' => '0,1'
			),
			array(
				'level_nama' => 'Administrator',
				'level_url' => 'dashboard/administrator',
				'level_icon' => 'fa-toolbox',
				'level_background' => '#778beb',
				'level_type' => 'Dashboard',
				'level_show_landing' => '0,1'
			),
			array(
				'level_nama' => 'Peserta Prakerin',
				'level_url' => 'dashboard/siswa',
				'level_icon' => 'fa-user',
				'level_background' => '#778beb',
				'level_type' => 'Dashboard',
				'level_show_landing' => '0,1'
			),
			array(
				'level_nama' => 'Pembimbing Sekolah',
				'level_url' => 'dashboard/staff',
				'level_icon' => 'fa-user',
				'level_background' => '#778beb',
				'level_type' => 'Dashboard',
				'level_show_landing' => '0,1'
			),
			array(
				'level_nama' => 'Pembimbing Industri',
				'level_url' => 'dashboard/pembimbing_industri',
				'level_icon' => 'fa-user',
				'level_background' => '#778beb',
				'level_type' => 'Dashboard',
				'level_show_landing' => '0,1'
			),
		);
		$this->db->insert_batch($this->table_name, $data);
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
