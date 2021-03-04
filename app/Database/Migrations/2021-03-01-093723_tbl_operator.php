<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblOperator extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> true,
			],

			'operator_name'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
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
		$this->forge->createTable('operator');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('operator');
	}
}
