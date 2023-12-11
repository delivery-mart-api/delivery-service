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

    public function create(){
        helper(['form']);

        $rules = [
            'address' => 'required|min_length[6]',
        ];

        if(!$this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        } else{
            $data = [
                'transaction_address' => $this->request->getVar('address'),
                'transaction_delivery_cost' => 10000,
            ];
            $transaction_id = $this->model->insert($data);
            $data['transaction_id'] = $transaction_id;
            return $this->respondCreated($data);
        }
    }
}
