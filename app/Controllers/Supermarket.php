<?php namespace App\Controllers;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;
use App\Models\SupermarketModel;

class Supermarket extends BaseController
{
    use ResponseTrait;
    
    protected $modelName = 'App\Models\SupermarketModel';
    protected $format = 'json';
    
    public function index(){
        $supermarkets = $this->model->findAll();
        return view('supermarket_view');
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
            'supermarket_username' => 'required|min_length[3]|max_length[20]',
            'supermarket_address' => 'required|min_length[8]|max_length[255]',
            'supermarket_telephone' => 'required|min_length[11]|max_length[13]|is_unique[supermarket.supermarket_telephone]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'matches[password]',
        ];

        if(! $this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        } else{
            $model = new SupermarketModel();
            $data = [
                'supermarket_username' => $this->request->getVar('supermarket_username'),
                'supermarket_address' => $this->request->getVar('supermarket_address'),
                'supermarket_telephone' => $this->request->getVar('supermarket_telephone'),
                'password' => $this->request->getVar('password'),
            ];

            $supermatket_id = $model->insert($data);
            $data['supermarket_id'] = $supermatket_id;
            unset($data['password']);

            return $this->respondCreated($data);
        }
    }
}
