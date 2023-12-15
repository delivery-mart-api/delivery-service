<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateSupermarketTable extends Migration
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
                'constraint'     => 20
            ],
            'supermarket_address'   => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'supermarket_telephone' => [
                'type'           => 'VARCHAR',
				'constraint'     => '12'
            ],
            'password' => [
                'type'           => 'VARCHAR',
				'constraint'     => 80
            ],
            'scope' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'default'        => 'app'
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addPrimaryKey('supermarket_id');
        $this->forge->createTable('supermarket', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('supermarket');
    }
}
