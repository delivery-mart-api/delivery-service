<?php

namespace App\Controllers;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function register(){
        helper('form');
        $data = [];

        if($this->request->getMethod() != 'post'){
            return $this->fail('Only post request is allowed');
        }

        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'phone' => 'required|min_length[11]|max_length[13]|is_unique[users.phone]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'matches[password]',
        ];

        if(! $this->validate($rules)){
            session()->setFlashData('Error', 'Registrasi Gagal!');
            return redirect()->to('/register')->withInput();
            // return $this->fail($this->validator->getErrors());
        } else{
            $model = new UserModel();
            $data = [
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'phone' => $this->request->getPost('phone'),
                'password' => $this->request->getPost('password'),
            ];

            $user_id = $model->insert($data);
            $data['id'] = $user_id;
            unset($data['password']);

            return redirect()->to('/');

            return $this->respondCreated($data);
        }
    }
}
