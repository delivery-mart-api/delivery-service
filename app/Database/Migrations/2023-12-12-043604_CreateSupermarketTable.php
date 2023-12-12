<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupermarketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
            ],
            'username'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 80
            ],
            'address'   => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'telephone' => [
                'type'           => 'VARCHAR',
				'constraint'     => '12'
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('username', 'oauth_users', 'username', 'CASCADE', 'CASCADE');
        $this->forge->createTable('supermarket', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('supermarket');
    }
}
