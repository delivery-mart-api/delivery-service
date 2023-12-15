<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOauthTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id'         => ['type' => 'VARCHAR', 'constraint' => 80],
            'client_secret'     => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'redirect_uri'      => ['type' => 'VARCHAR', 'constraint' => 2000, 'null' => true],
            'grant_types'       => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'scope'             => ['type' => 'VARCHAR', 'constraint' => 4000, 'null' => true],
            'user_id'           => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('client_id');
        $this->forge->createTable('oauth_clients', TRUE);

        $this->forge->addField([
            'access_token'      => ['type' => 'VARCHAR', 'constraint' => 40],
            'client_id'         => ['type' => 'VARCHAR', 'constraint' => 80],
            'user_id'           => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'expires'           => ['type' => 'TIMESTAMP'],
            'scope'             => ['type' => 'VARCHAR', 'constraint' => 4000, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('access_token');
        $this->forge->createTable('oauth_access_tokens', TRUE);

        // Tabel oauth_authorization_codes
        $this->forge->addField([
            'authorization_code'    => ['type' => 'VARCHAR', 'constraint' => 40],
            'client_id'             => ['type' => 'VARCHAR', 'constraint' => 80],
            'user_id'               => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'redirect_uri'          => ['type' => 'VARCHAR', 'constraint' => 2000, 'null' => true],
            'expires'               => ['type' => 'TIMESTAMP'],
            'scope'                 => ['type' => 'VARCHAR', 'constraint' => 4000, 'null' => true],
            'id_token'              => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('authorization_code');
        $this->forge->createTable('oauth_authorization_codes', TRUE);

        // Tabel oauth_refresh_tokens
        $this->forge->addField([
            'refresh_token'     => ['type' => 'VARCHAR', 'constraint' => 40],
            'client_id'         => ['type' => 'VARCHAR', 'constraint' => 80],
            'user_id'           => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'expires'           => ['type' => 'TIMESTAMP'],
            'scope'             => ['type' => 'VARCHAR', 'constraint' => 4000, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('refresh_token');
        $this->forge->createTable('oauth_refresh_tokens', TRUE);

        // Tabel oauth_users

        // Tabel oauth_scopes
        $this->forge->addField([
            'scope'             => ['type' => 'VARCHAR', 'constraint' => 80],
            'is_default'        => ['type' => 'BOOLEAN'],
        ]);
        $this->forge->addPrimaryKey('scope');
        $this->forge->createTable('oauth_scopes', TRUE);

        // Tabel oauth_jwt
        $this->forge->addField([
            'client_id'         => ['type' => 'VARCHAR', 'constraint' => 80],
            'subject'           => ['type' => 'VARCHAR', 'constraint' => 80],
            'public_key'        => ['type' => 'VARCHAR', 'constraint' => 2000],
        ]);
        $this->forge->createTable('oauth_jwt', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('oauth_clients');
        $this->forge->dropTable('oauth_access_tokens');
        $this->forge->dropTable('oauth_authorization_codes');
        $this->forge->dropTable('oauth_refresh_tokens');
        $this->forge->dropTable('oauth_users');
        $this->forge->dropTable('oauth_scopes');
        $this->forge->dropTable('oauth_jwt');
    }
}
