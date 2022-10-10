<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_nilai_prakerin extends CI_Migration
{
	protected $table_name = "ak_data_histori_nilai_prakerin";
	protected $prefix = "nilai_prakerin_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'biodata_prakerin_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . '1' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '2' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '3' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '4' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '5' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '6' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '7' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '8' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '9' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . '10' => array(
				'type' => 'FLOAT',
				'unsigned' => TRUE
			),
			$this->prefix . 'validator' => array(
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
