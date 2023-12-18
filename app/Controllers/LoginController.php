<?php

namespace App\Controllers;

use App\Models\UserModel; 
use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function index()
    {   
        if (session()->get('num_user') != '') {
            return redirect()->to('/supermarket');
        }
        return view('login_view');
    }

    public function login_user(){
        $model = model(LoginModel::class);
        
        $phone = $this->request->getPost('phone');
        $password = sha1($this->request->getPost('password'));
        $cek = $model->getUsers($phone, $password);
        if ($cek == 0){
            session()->setFlashdata('error', 'Phone atau password salah!');
            return redirect()->to('/');
        } else {
            session()->set('num_user', $cek);
            return redirect()->to('/supermarket');
        }
    }

    public function login_supermarket(){
        $model = model(LoginModel::class);
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));
        $cek = $model->getUsers($username, $password);
        if ($cek == 0){
            return redirect()->to('/');
        } else {
            session()->set('num_user', $cek);
            return redirect()->to('/supermarket');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

}
