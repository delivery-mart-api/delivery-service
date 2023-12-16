<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;

class Transaction extends ResourceController
{
    protected $modelName = 'App\Models\TransactionModel';
    protected $format = 'json';
    
    public function index($seg1 = null, $seg2 = null){
        $model = model(LoginModel::class);
        $username = $seg1;
        $password = sha1($seg2);
        $cek = $model->getUsers($username, $password);
        if ($cek == 0) {
            return("Wrong Authentication!" . $password);
        } else {
            $transactions = $this->model->findAll();
            return $this->respond($transactions);
        }
    }

    public function create(){
        helper(['form']);

        $rules = [
            'address' => 'required|min_length[6]',
            'user_id' => 'required|numeric'
        ];

        if(!$this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        } else{
            $data = [
                'user_id'      => $this->request->getVar('user_id'),
                'address' => $this->request->getVar('address'),
                'delivery_cost' => rand(2000, 100000),
            ];
            $transaction_id = $this->model->insert($data);
            $data['id'] = $transaction_id;
            return $this->respondCreated($data);
        }
    }
}
