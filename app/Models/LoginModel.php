<?php
namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{   
    public function getUsers($phone, $password){
        $db = db_connect();
        $builder = $db->table('users');
        $where = ['phone' => $phone, 'password' => $password];
        $builder->where($where);
        $user = $builder->get()->getRowArray();

        if (!$user) {
            $supermarketBuilder = $db->table('supermarket');
            $supermarketWhere = ['supermarket_username' => $phone, 'password' => $password];
            $user = $supermarketBuilder->where($supermarketWhere)->get()->getRowArray();
            return $user ?  array_merge($user) : false;
        }
        return $user ? array_merge($user) : false;
    }
}