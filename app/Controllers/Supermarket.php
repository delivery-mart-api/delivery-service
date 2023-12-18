<?php namespace App\Controllers;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;
use App\Models\SupermarketModel;
use CodeIgniter\RESTful\ResourceController;

class Supermarket extends ResourceController
{
    use ResponseTrait;
    
    protected $modelName = 'App\Models\SupermarketModel';
    protected $format = 'json';
    
    public function index(){
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }
            
        $supermarkets = $this->model->findAll();
        $data = [
            'title'        => 'Supermarket | HeMart',
            'supermarkets' => $supermarkets
        ];
        return view('supermarket_view', $data);
    }

    public function details($seg1 = null){
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }

        // Fetch API Supermarket

        $client = \Config\Services::curlrequest();
        $apiUrl = 'http://localhost:8081/api/products/indoapril/password';
        $response = $client->request('GET', $apiUrl);
        $products = json_decode($response->getBody(), true);
        $data = [
            'title'        => 'Proudcts | HeMart',
            'products'     => $products,
            'supermarket'  => $seg1
        ];
        return view('product_view', $data);
    }

    public function login(){
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();

        return $this->respond(json_decode($body), $code);
    }

    public function register(){
        helper('form');
        $data = [];

        if($this->request->getMethod() != 'post'){
            return $this->fail('Only post request is allowed');
        }

        $rules = [
            'supermarket_name' => 'required|min_length[3]|max_length[30]',
            'supermarket_username' => 'required|min_length[3]|max_length[20]|is_unique[supermarket.supermarket_username]',
            'supermarket_address' => 'required|min_length[8]|max_length[255]',
            'supermarket_telephone' => 'required|min_length[11]|max_length[13]|is_unique[supermarket.supermarket_telephone]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'matches[password]',
        ];

        if(! $this->validate($rules)){
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('/mitra/register')->withInput();
        } else{
            $model = new SupermarketModel();
            $data = [
                'supermarket_name' => $this->request->getVar('supermarket_name'),
                'supermarket_username' => $this->request->getVar('supermarket_username'),
                'supermarket_address' => $this->request->getVar('supermarket_address'),
                'supermarket_telephone' => $this->request->getVar('supermarket_telephone'),
                'password' => $this->request->getVar('password'),
            ];

            $supermatket_id = $model->insert($data);
            $data['supermarket_id'] = $supermatket_id;
            session()->setFlashdata('success', 'Registration successful!');
            return redirect()->to('/');
        }
    }
}
