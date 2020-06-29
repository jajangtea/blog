<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'            => [
				'type'              => 'BIGINT',
				'unsigned'          => TRUE,
				'auto_increment'    => TRUE
			],
			'title'              => [
				'type'              => 'VARCHAR',
				'constraint'        => '100',
			],
			'content'                  => [
				'type'              => 'VARCHAR',
				'constraint'        => '100',
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
