<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Oauth extends Seeder
{
    public function run()
    {
        $oauth_clients = [
            [
                'client_id' => 'testclient',
                'client_secret' => 'testsecret',
                'grant_types' => 'password',
                'scope' => 'app',
            ]
        ];

        foreach($oauth_clients as $data){
            $this->db->table('oauth_clients')->insert($data);
        }

    }
}
