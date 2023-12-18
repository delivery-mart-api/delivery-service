<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $allowedFields = ['delivery_cost', 'address', 'created_at', 'user_id', 'supermarket_id', 'product_id'];

    public function findByUserId($id)
    {
        $data = $this->where('user_id', $id)->findAll();

        if ($data) {
            return $data;
        }

        return false;
    }

    public function findAllTransaction()
    {
        $data = $this->findAll();

        if ($data) {
            return $data;
        }

        return false;
    }
    
    function calculateShare($share, $id) {
        $transactions = $this->where('supermarket_id', $id)->findAll();
        if (!$transactions) {
            return 0;
        }
        $totalSupermarketShare = 0;
        foreach($transactions as $transaction) :
            $transactionPrice = $transaction['delivery_cost'];
            $supermarketShare = ($transactionPrice) * ($share / 100);
            $totalSupermarketShare += $supermarketShare;
        endforeach;
        return $totalSupermarketShare;
    }
}

