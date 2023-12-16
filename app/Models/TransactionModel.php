<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $allowedFields = ['delivery_cost', 'address', 'created_at', 'user_id', 'supermarket_id'];

    public function findByUserId($id)
    {
        $data = $this->where('user_id', $id)->findAll();

        if ($data) {
            return $data;
        }

        return false;
    }
}

