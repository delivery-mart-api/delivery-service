<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
    protected $allowedFields = ['transaction_delivery_cost', 'transaction_address'];
}