<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $allowedFields = ['delivery_cost', 'address', 'created_at', 'user_id'];
}