<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'supermarket_id'        => [
                'type'           => 'INT',
                'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
            ],
            'supermarket_username'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 80
            ],
            'supermarket_address'   => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'supermarket_telephone' => [
                'type'           => 'VARCHAR',
				'constraint'     => '12'
            ],
        ]);

        $this->forge->addPrimaryKey('supermarket_id');
        $this->forge->addForeignKey('supermarket_username', 'oauth_users', 'username', 'CASCADE', 'CASCADE');
        $this->forge->createTable('supermarket', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('supermarket');
    }
}