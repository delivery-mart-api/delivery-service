<?php namespace App\Models;

use CodeIgniter\Model;

class SupermarketModel extends Model{
    protected $table = 'supermarket';
    protected $primaryKey = 'supermarket_id';
    protected $allowedFields = ['supermarket_name', 'supermarket_username', 'supermarket_address', 'supermarket_telephone', 'password'];

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
        if (isset($data['data']['password'])) {
            $data['data']['password'] = sha1($data['data']['password']);
        }
        return $data;
    }

    public function findById($id)
    {
        $data = $this->where('supermarket_id', $id)->first();

        if ($data) {
            return $data;
        }

        return false;
    }

    public function findByUsername($username)
    {
        $data = $this->where('supermarket_username', $username)->first();

        if ($data) {
            return $data;
        }

        return false;
    }
}