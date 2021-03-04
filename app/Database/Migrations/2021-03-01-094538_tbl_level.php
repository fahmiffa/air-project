<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblLevel extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> true,
			],

			'level_name'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
			],

			
			'level_desc'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
			],

			'level_status'	=> [
				'type'			=> 'tinyint',
				'constraint'	=> 1,
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
		$this->forge->createTable('level');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('level');
	}
}
