<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;
use App\Models\TransactionModel;
use App\Models\SupermarketModel;

class Transaction extends ResourceController
{
    protected $modelName = 'App\Models\TransactionModel';
    protected $format = 'json';
    
    public function index($seg1 = null, $seg2 = null){
        $model = model(LoginModel::class);
        $username = $seg1;
        $password = $seg2;
        $cek = $model->getUsers($username, $password);
        if ($cek == 0) {
            return $this->respond('Wrong Authentication', 401);
        } else {
            $model1 = model(SupermarketModel::class);
            $supermarket = $model1->findByUsername($username);
            $transactions = $this->model->where('supermarket_id', $supermarket['supermarket_id'])->findAll();

            foreach ($transactions as &$transaction) {
                $transaction['supermarket_username'] = $supermarket['supermarket_username'];
            }
            return $this->respond($transactions);
        }
    }

    public function history(){
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }
        $user = session()->get('num_user');


        $supermarket = model(SupermarketModel::class)->findById('1');
        $client = \Config\Services::curlrequest();
        $apiUrl = "http://localhost:8081/api/products/{$supermarket['supermarket_username']}/{$supermarket['password']}";
        $response = $client->request('GET', $apiUrl);
        $products = json_decode($response->getBody(), true);

        $productsName = [];
        foreach ($products as $product) {
            $productsName[$product['id']] = $product['nama'];
        }

        $model = model(TransactionModel::class);
        $transactions = $model->findByUserId($user['id']);
        $data = [
            'title'        => 'My Transactions | HeMart',
            'transactions' => $transactions,
            'products'     => $productsName,
        ];
        return view('transaction_history_view', $data);

    }

    public function create(){
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }
        helper(['form']);

        $rules = [
            'address' => 'required|min_length[6]',
            'user_id' => 'required|numeric',
            'supermarket_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];

        if(!$this->validate($rules)){
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
            return redirect()->back();
        } else{
            $user = session()->get('num_user');
            $data = [
                'user_id'      => $this->request->getPost('user_id'),
                'supermarket_address'      => $this->request->getPost('address'),
                'supermarket_id'      => $this->request->getPost('supermarket_id'),
                'address' => $this->request->getPost('address'),
                'delivery_cost' => $this->request->getPost('shipping'),
                'product_id'      => $this->request->getPost('product_id'),
                'quantity'      => $this->request->getPost('quantity'),
            ];
            $transaction = $this->model->insert($data);
            return redirect()->to("/transaction");
        }
    }
}
