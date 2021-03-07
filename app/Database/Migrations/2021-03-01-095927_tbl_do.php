<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblDo extends Migration
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

			'sales_id'	=> [
				'type'			=> 'int',
				'constraint'	=> 5,
			],

			'do_name'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
			],


			'do_number'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 20,
			],


			'do_phone'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 13,
			],

			'do_address'	=> [
				'type'			=> 'text',
				'null'			=> true,
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
		$this->forge->addForeignKey('sales_id', 'sales', 'id', 'RESTRICT', 'RESTRICT');
		$this->forge->createTable('do');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('do');
	}
}
