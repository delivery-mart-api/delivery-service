<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'password', 'phone', 'age'];

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

    public function findByUserId($id)
    {
        $data = $this->where('id', $id)->findAll();

        if ($data) {
            return $data;
        }

        return false;
    }
}