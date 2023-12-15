<?php namespace App\Models;

use CodeIgniter\Model;

class SupermarketModel extends Model{
    protected $table = 'supermarket';
    protected $primaryKey = 'supermarket_id';
    protected $allowedFields = ['supermarket_username', 'supermarket_address', 'supermarket_telephone', 'password'];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data){
        if(isset($data['data']['password'])){
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}