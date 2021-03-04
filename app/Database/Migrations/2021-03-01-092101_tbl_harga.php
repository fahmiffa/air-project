<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblHarga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> true,
			],

			'price_value'	=> [
				'type'			=> 'int',
				'constraint'	=> 5,
			],
			
			'price_type'	=> [
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
		$this->forge->createTable('price');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('price');
	}
}
