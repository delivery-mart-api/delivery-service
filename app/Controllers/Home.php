<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Home extends BaseController
{
    public function index()
    {   
        // $UserModel = new \App\Models\UserModel(); 
        // $login = $this->request->getVar('login');
        // if($login){
        //     $phone = $this->request->getVar('phone');
        //     $password = $this->request->getVar('password');

        //     if($phone == '' or $password == ''){
        //         $err = "Please fill all required form!";
        //     }

        //     if($err){
        //         session()->setFlashdata('phone', $phone);
        //         session()->setFlashdata('error', $err);
        //         return redirect()->to('/');
        //     }
        // }
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'phone' => 'required|min_length[11]|max_length[13]|',
                'password' => 'required|validateUser[phone,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Phone orf Password don\'t match'
                ]
                ];

            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
                print_r("gagal masuk");
            } else{
                $model = new UserModel();
    
                $user = $model->where('phone', $this->request->getVar('phone'))->first();
                $this->setUserSession($user);
                print_r("berhasil masuk");
                return redirect()->to('/transaction');
            }
        }

        return view('login_view');
    }

    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'phone' => $user['phone'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }
}
