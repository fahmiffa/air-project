<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPelanggan extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
				'auto_increment'=> true,
			],
			'price_id'	=> [
				'type'			=> 'INT',
				'constraint'	=> 11,
			],

			'customer_name'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],

			'customer_telphone'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 13,
			],
			'customer_pic'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50,
			],
			'customer_hp'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 13,
			],

			'customer_address'		=> [
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
		$this->forge->addForeignKey('price_id','price','id','RESTRICT','RESTRICT');
		$this->forge->createTable('customer');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('customer');
	}
}
