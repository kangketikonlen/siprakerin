<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_submenu extends CI_Migration
{
	protected $table_name = "ak_data_system_menu_sub";
	protected $prefix = "submenu_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'menu_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'urutan' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'root' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'roles' => array(
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
				'menu_id' => 1,
				'submenu_urutan' => 1,
				'submenu_root' => 'Informasi Sistem',
				'submenu_nama' => 'Informasi Sistem',
				'submenu_url' => 'sistem/informasi_sistem',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 2,
				'submenu_root' => 'Informasi Instansi',
				'submenu_nama' => 'Informasi Instansi',
				'submenu_url' => 'sistem/informasi_instansi',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 3,
				'submenu_root' => 'Menu Utama',
				'submenu_nama' => 'Daftar Menu',
				'submenu_url' => 'sistem/menu_utama',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 4,
				'submenu_root' => 'Submenu',
				'submenu_nama' => 'Daftar Submenu',
				'submenu_url' => 'sistem/submenu',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 5,
				'submenu_root' => 'Daftar Level',
				'submenu_nama' => 'Daftar Level',
				'submenu_url' => 'sistem/daftar_level',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 6,
				'submenu_root' => 'Hak Akses Menu',
				'submenu_nama' => 'Daftar Hak Akses Menu',
				'submenu_url' => 'sistem/hak_akses_menu',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 7,
				'submenu_root' => 'Daftar User',
				'submenu_nama' => 'Daftar User',
				'submenu_url' => 'sistem/daftar_user',
				'submenu_roles' => '0,1'
			),
			array(
				'menu_id' => 1,
				'submenu_urutan' => 8,
				'submenu_root' => 'Hak Akses Modul',
				'submenu_nama' => 'Daftar Hak Akses Modul',
				'submenu_url' => 'sistem/hak_akses_modul',
				'submenu_roles' => '0,1'
			)
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
