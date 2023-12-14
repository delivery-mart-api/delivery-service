<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Supermarket extends ResourceController
{
    protected $modelName = 'App\Models\SupermarketModel';
    protected $format = 'json';
    
    public function index(){
        $supermarkets = $this->model->findAll();
        return $this->respond($supermarkets);
    }
}
