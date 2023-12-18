<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phone' => '081912345678',
                'password' => sha1('password'),
            ]
        ];

        foreach($users as $data){
            $this->db->table('users')->insert($data);
        }

        $supermarket = [
            [
                'supermarket_name' => 'Indo April',
                'supermarket_username' => 'indoapril',
                'supermarket_address' => 'Jalan H Juanda No.1, Coblong',
                'supermarket_telephone' => '089912345678',
                'password' => sha1('password'),
            ]
        ];

        foreach($supermarket as $data){
            $this->db->table('supermarket')->insert($data);
        }

        $transaction = [
            [
                'delivery_cost' => 15000,
                'address' => 'Jalan Cisitu Indah No.1',
                'user_id' => '1',
                'supermarket_id' => '1',
                'product_id' => '1',
                'quantity' => 2
            ]
        ];

        foreach($transaction as $data){
            $this->db->table('transaction')->insert($data);
        }

    }
}
