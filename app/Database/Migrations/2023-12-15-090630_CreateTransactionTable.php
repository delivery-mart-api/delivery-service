<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 255,
				'unsigned'       => true,
				'auto_increment' => true
            ],
            'delivery_cost'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'address'   => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
				'unsigned'       => true,
            ],
            'supermarket_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
				'unsigned'       => true,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('supermarket_id', 'supermarket', 'supermarket_id');
        $this->forge->createTable('transaction', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('transaction');
    }
}
