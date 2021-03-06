<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jenis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment' => true,
			],

			'jenis_value'	=> [
				'type'			=> 'int',
				'constraint'	=> 5,
			],

			'jenis_customer'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 10,
			],

			'deleted_at'	=> [
				'type'		=> 'DATETIME',
				'null'		=> true,
			],

			'created_at'	=> [
				'type'		=> 'DATETIME',
				'null'		=> true,
			],

			'updated_at'	=> [
				'type'		=> 'DATETIME',
				'null'		=> true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('jenis');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('jenis');
	}
}
