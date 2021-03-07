<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUsers extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		// $this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment' => true,
			],
			'level_id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],

			'username'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'fullname'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'email'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'password'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 100,
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
		$this->forge->addForeignKey('level_id', 'level', 'id', 'RESTRICT', 'RESTRICT');
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
