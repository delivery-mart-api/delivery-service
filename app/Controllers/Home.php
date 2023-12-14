<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Home extends BaseController
{
    public function index()
    {   
        $UserModel = new \App\Models\UserModel(); 
        $login = $this->request->getVar('login');
        if($login){
            $phone = $this->request->getVar('phone');
            $password = $this->request->getVar('password');

            if($phone == '' or $password == ''){
                $err = "Please fill all required form!";
            }

            if($err){
                session()->setFlashdata('phone', $phone);
                session()->setFlashdata('error', $err);
                return redirect()->to('/');
            }
        }
        return view('login_view');
    }
}
