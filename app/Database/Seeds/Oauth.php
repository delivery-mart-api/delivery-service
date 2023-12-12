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

        $oauth_users = [
            [
                'username' => 'naufal',
                'password' => sha1('password'),
                'first_name' => 'muhammad',
                'last_name' => 'naufal',
                'email' => 'naufal@gmail.com',
                'email_verified' => true,
                'scope' => 'app'
            ]
        ];

        foreach($oauth_clients as $data){
            $this->db->table('oauth_clients')->insert($data);
        }

        foreach($oauth_users as $data){
            $this->db->table('oauth_users')->insert($data);
        }
    }
}
