<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Transaction extends ResourceController
{
    protected $modelName = 'App\Models\TransactionModel';
    protected $format = 'json';
    
    public function index(){
        $transactions = $this->model->findAll();
        return $this->respond($transactions);
    }
}
