<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSales extends Migration
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

			'customer_id'	=> [
				'type'			=> 'int',
				'constraint'	=> 5,
			],

			'operator_id'	=> [
				'type'			=> 'int',
				'constraint'	=> 5,
			],
			'sales_number'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
			],

			'sales_name'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 50,
			],

			'sales_phone'	=> [
				'type'			=> 'varchar',
				'constraint'	=> 13,
			],

			'sales_date'	=> [
				'type'			=> 'date',
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
		$this->forge->addForeignKey('customer_id','customer','id','RESTRICT','RESTRICT');
		$this->forge->addForeignKey('operator_id','operator','id','RESTRICT','RESTRICT');
		$this->forge->createTable('tr_sales');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tr_sales');
	}
}
