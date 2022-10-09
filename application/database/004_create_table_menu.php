<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_menu extends CI_Migration
{
	protected $table_name = "ak_data_system_menu";
	protected $prefix = "menu_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			$this->prefix . 'urutan' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'icon' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'dropdown' => array(
				'type' => 'ENUM("Dropdown","Single")',
				'default' => "Dropdown",
				'null' => FALSE
			),
			$this->prefix . 'url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => '#',
				'null' => FALSE
			),
			$this->prefix . 'roles' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => '0,1',
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

	private function seed_sample()
	{
		$data = array(
			'menu_urutan' => 1,
			'menu_icon' => 'fa-server',
			'menu_nama' => 'Sistem',
			'menu_dropdown' => 'Dropdown',
			'menu_url' => '#',
			'menu_roles' => '0,1'
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
