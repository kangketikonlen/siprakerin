<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Modify_table_menu extends CI_Migration
{
	protected $table_name = "ak_data_system_menu";
	protected $prefix = "menu_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'cpath' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => $this->prefix . 'roles'
			),
			$this->prefix . 'mpath' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => $this->prefix . 'cpath'
			),
			$this->prefix . 'vpath' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => $this->prefix . 'mpath'
			),
			$this->prefix . 'jpath' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => $this->prefix . 'vpath'
			),
		);

		return $fields;
	}

	private function seed_sample()
	{
		$data = array(
			$this->prefix . 'cpath' => './application/controllers/Sistem',
			$this->prefix . 'mpath' => './application/models/Sistem',
			$this->prefix . 'vpath' => './application/views/sistem',
			$this->prefix . 'jpath' => './application/js/sistem',
		);
		$this->db->update($this->table_name, $data);
	}

	public function up()
	{
		// Generate fields
		$fields = $this->generate_fields();
		// Add field from above variables
		$this->dbforge->add_column($this->table_name, $fields);
		// Seed database
		$this->seed_sample();
	}

	public function down()
	{
		$this->dbforge->drop_column($this->table_name, $this->prefix . 'cpath');
		$this->dbforge->drop_column($this->table_name, $this->prefix . 'mpath');
		$this->dbforge->drop_column($this->table_name, $this->prefix . 'vpath');
		$this->dbforge->drop_column($this->table_name, $this->prefix . 'jpath');
	}
}
