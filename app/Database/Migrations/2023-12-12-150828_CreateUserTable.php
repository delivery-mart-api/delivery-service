<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUserTable extends Migration
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
            'firstname'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 20
            ],
            'lastname'   => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
            'phone' => [
                'type'           => 'VARCHAR',
				'constraint'     => 13
            ],
            'password' => [
                'type'           => 'VARCHAR',
				'constraint'     => 80
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}