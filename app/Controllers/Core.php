<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;
use App\Models\TransactionModel;
use App\Models\SupermarketModel;
use App\Models\UserModel;

class Core extends ResourceController
{
    public function index($seg1 = null, $seg2 = null){
        $model = model(LoginModel::class);
        $username = $seg1;
        $password = $seg2;
        $cek = $model->getUsers($username, $password);
        if ($cek == 0) {
            return $this->respond('Wrong Authentication', 401);
        } else {
            $supermarket = model(SupermarketModel::class)->findByUsername($username);
            $supermarketShare = model(TransactionModel::class)->calculateShare(90, $supermarket['supermarket_id']);
            return $this->respond($supermarketShare);
        }
    }
}