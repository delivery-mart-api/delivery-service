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
        $password = sha1($seg2);
        $cek = $model->getUsers($username, $password);
        if ($cek == 0) {
            return $this->respond('Wrong Authentication', 401);
        } else {
            $supermarket = model(SupermarketModel::class)->findByUsername($username);
            $supermarketShare = model(TransactionModel::class)->calculateShare(90, $supermarket['supermarket_id']);
            return $this->respond($supermarketShare);
        }
    }

    public function delivery($supermarket_id, $age) {
        $transactions = model(TransactionModel::class)->findBySupermarketId($supermarket_id);
        if (!$transactions) {
            return 0;
        } else {
            $products = array();
            foreach($transactions as $transaction) :
                if ((model(UserModel::class)->findByUserId($transaction['user_id']))[0]['age'] == $age) {
                    array_push($products,$transaction['product_id']);
                }
            endforeach;
            $maxProduct = 0;
            $countTotal = 0;
            foreach($products as $product) :
                $count = 0;
                foreach($products as $product2) :
                    if ($product == $product2) {
                        $count += 1;
                    }
                endforeach;
                if ($count > $countTotal) {
                    $countTotal = $count;
                    $maxProduct = $product;
                }
            endforeach;
            return $this->respond($maxProduct);
        }
    }
}