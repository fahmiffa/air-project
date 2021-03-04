<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableSetting extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'id'		=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> true,
			],


			'setting_name'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'setting_address'	=> [
				'type'			=> 'TEXT',
				'null'			=> true,
			], 


			'setting_districts'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'setting_city'		=> [
				'type'			=> 'VARCHAR',	
				'constraint'	=> 50,
			],

			'setting_email'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'setting_phone'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20
			],

			'deleted_at'	=> [
				'type'			=> 'DATETIME',
				'null'			=> true,
			],

			'created_at'	=> [
				'type'			=> 'DATETIME',
				'null'			=> true,
			],

			'updated_at'	=> [
				'type'			=> 'DATETIME',
				'null'			=> true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('setting');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('setting');
	}
}
