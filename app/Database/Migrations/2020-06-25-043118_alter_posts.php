<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPosts extends Migration
{
	public function up()
	{
		$field = [
			'created_at'              => [
				'type'              => 'DATE',
			],
			'updated_at'                  => [
				'type'              => 'DATE',
			],
			'deleted_at'                  => [
				'type'              => 'DATE',
			],
		];
		$this->forge->addColumn('posts', $field);
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
