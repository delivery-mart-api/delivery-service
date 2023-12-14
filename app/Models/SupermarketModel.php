<?php namespace App\Models;

use CodeIgniter\Model;

class SupermarketModel extends Model{
    protected $table = 'supermarket';
    protected $primaryKey = 'supermarket_id';
    protected $allowedFields = ['supermarket_username', 'supermarket_address', 'supermarket_telephone'];
}